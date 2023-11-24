<?php

declare(strict_types=1);

namespace Mautic\InstallBundle\Tests\Functional;

use Mautic\CoreBundle\Helper\FileHelper;
use Mautic\CoreBundle\Test\IsolatedTestTrait;
use Mautic\CoreBundle\Test\MauticMysqlTestCase;
use Mautic\InstallBundle\Configurator\Step\CheckStep;
use Mautic\LeadBundle\Entity\LeadField;
use PHPUnit\Framework\Assert;
use Symfony\Component\HttpFoundation\Request;

/**
 * This test must run in a separate process because it sets the global constant
 * MAUTIC_INSTALLER which breaks other tests.
 *
 * @runTestsInSeparateProcesses
 *
 * @preserveGlobalState disabled
 */
class InstallWorkflowTest extends MauticMysqlTestCase
{
    use IsolatedTestTrait;

    protected $useCleanupRollback = false;

    private string $localConfigPath;

    private string $defaultMemoryLimit;

    protected function setUp(): void
    {
        parent::setUp();
        $this->localConfigPath    = self::$container->get('kernel')->getLocalConfigFile();
        $this->defaultMemoryLimit = ini_get('memory_limit');

        if (file_exists($this->localConfigPath)) {
            // Move local.php so we can get to the installer.
            rename($this->localConfigPath, $this->localConfigPath.'.bak');
        }
    }

    protected function beforeTearDown(): void
    {
        if (file_exists($this->localConfigPath)) {
            // Remove the local.php generated by this test.
            unlink($this->localConfigPath);
        }
        if (file_exists($this->localConfigPath.'.bak')) {
            // Restore the local config file in it's original state.
            rename($this->localConfigPath.'.bak', $this->localConfigPath);
        }

        ini_set('memory_limit', $this->defaultMemoryLimit);
    }

    public function testInstallWorkflow(): void
    {
        // Step 0: System checks.
        $crawler = $this->client->request(Request::METHOD_GET, '/installer');
        Assert::assertTrue($this->client->getResponse()->isOk(), $this->client->getResponse()->getContent());

        $submitButton = $crawler->selectButton('install_check_step[buttons][next]');
        $form         = $submitButton->form();
        $crawler      = $this->client->submit($form);

        Assert::assertTrue($this->client->getResponse()->isOk(), $this->client->getResponse()->getContent());

        // Step 1: DB.
        $submitButton = $crawler->selectButton('install_doctrine_step[buttons][next]');
        $form         = $submitButton->form();

        $form['install_doctrine_step[host]']->setValue($this->connection->getParams()['host']);
        $form['install_doctrine_step[port]']->setValue((string) $this->connection->getParams()['port']);
        $form['install_doctrine_step[name]']->setValue($this->connection->getParams()['dbname']);
        $form['install_doctrine_step[user]']->setValue($this->connection->getParams()['user']);
        $form['install_doctrine_step[password]']->setValue($this->connection->getParams()['password']);
        $form['install_doctrine_step[backup_tables]']->setValue('0');

        $crawler = $this->client->submit($form);
        Assert::assertTrue($this->client->getResponse()->isOk(), $this->client->getResponse()->getContent());

        // Step 2: Admin user.
        $submitButton = $crawler->selectButton('install_user_step[buttons][next]');
        $form         = $submitButton->form();

        $form['install_user_step[username]']->setValue('admin');
        $form['install_user_step[password]']->setValue('maut!cR000cks');
        $form['install_user_step[firstname]']->setValue('admin');
        $form['install_user_step[lastname]']->setValue('mautic');
        $form['install_user_step[email]']->setValue('mautic@example.com');

        $crawler = $this->client->submit($form);
        Assert::assertTrue($this->client->getResponse()->isOk(), $this->client->getResponse()->getContent());
        $heading = $crawler->filter('.panel-body.text-center h5');
        Assert::assertCount(1, $heading, $this->client->getResponse()->getContent());

        $successText = $heading->text();
        Assert::assertStringContainsString('Mautic is installed', $successText);

        // Assert that the fixtures were loaded
        $fieldRepository = $this->em->getRepository(LeadField::class);

        $emailField = $fieldRepository->findOneBy(['alias' => 'email']);
        \assert($emailField instanceof LeadField);
        Assert::assertSame('Email', $emailField->getLabel());
    }

    public function testInstallRequirementsAndRecommendations(): void
    {
        $limit                 = FileHelper::convertPHPSizeToBytes(CheckStep::RECOMMENDED_MEMORY_LIMIT);
        $expectedMemoryMessage = self::$container->get('translator')->trans('mautic.install.memory.limit', ['%min_memory_limit%' => CheckStep::RECOMMENDED_MEMORY_LIMIT]);

        // set the memory limit lower than the recommended value.
        ini_set('memory_limit', (string) ($limit - 1));
        $crawler = $this->client->request(Request::METHOD_GET, '/installer');
        Assert::assertTrue($this->client->getResponse()->isOk(), $this->client->getResponse()->getContent());

        $details = $crawler->filter('#minorDetails ul')->html();
        Assert::assertStringContainsString($expectedMemoryMessage, $details);

        // set the memory limit higher than the recommended value.
        ini_set('memory_limit', (string) ($limit + 1));
        $crawler = $this->client->request(Request::METHOD_GET, '/installer');
        Assert::assertTrue($this->client->getResponse()->isOk(), $this->client->getResponse()->getContent());

        $details = $crawler->filter('#minorDetails ul')->html();
        Assert::assertStringNotContainsString($expectedMemoryMessage, $details);
    }
}
