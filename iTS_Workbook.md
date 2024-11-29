[![codecov](https://codecov.io/gh/mautic/mautic/branch/features/graph/badge.svg)](https://codecov.io/gh/mautic/mautic)
<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-152-orange.svg?style=flat-square)](#contributors-)
<!-- ALL-CONTRIBUTORS-BADGE:END -->

Mautic for iTS In Co
============
Mautic is the world’s largest open source marketing automation project. With over 200,000 organisations using Mautic and over 1,000 community volunteers, we empower businesses by making it easy to manage their marketing across a range of channels. Stay up to date about initiatives, releases and strategy via our [blog][mautic-blog].

Marketing automation has historically been difficult to implement within organisations. The Mautic Community is an example of open source at its best, offering great software and a vibrant and caring community in which to learn and share knowledge.

Open source means more than open code. Open source provides equality for all and a chance for everyone to improve.

![Mautic](.github/readme_image.png "Mautic Open Source Marketing Automation")

Development Selfhelp Guidebook for toolkit developers
=============
Before we tell you how to install and use Mautic, we like to shamelessly plug our awesome user and developer communities! Users, start [here][get-involved] for inspiration, or follow us on Twitter [@MauticCommunity][twitter] or Facebook [@MauticCommunity][facebook]. Once you’re familiar with using the software, maybe you will share your wisdom with others in our [Slack][slack] channel.

Calling all devs, testers and tech writers! Technical contributions are also welcome. First, read our [general guidelines][contributing] about contributing. If you want to contribute code, read our [CONTRIBUTING.md][contributing-md] or [Contributing Code][contribute-developer] docs then check out the issues with the [T1 label][t1-issues] to get stuck in quickly and show us what you’re made of.

If you have questions, the Mautic Community can help provide the answers.

Installing and using Mautic
============================

## Supported Versions

Please check the latest supported versions on the [Mautic Releases](https://www.mautic.org/mautic-releases) page.

## Software Downloads
The GitHub version is recommended for both development and testing. The production package (including all libraries) is available at [mautic.org/download][download-mautic].

## Installation
### Disclaimer
*Install from source only if you are comfortable using the command line. You'll be required to use various CLI commands to get Mautic working and keep it working. If the source/database schema gets out of sync with Mautic releases, the release updater may not work and will require manual updates. For production, we recommend the pre-packaged Mautic which is available at [mautic.org/download][download-mautic].*

*Also note that source code outside of a [tagged release][tagged-release] should be considered ‘alpha’. It may contain bugs, cause unexpected results, data corruption or loss, and is not recommended for use in a production environment. Use at your own risk.*

### How to install Mautic
You must already have [Composer][composer] available on your computer because this is a development release and you'll need Composer to download the vendor packages.

Also note that if you have DDEV installed, you can just run 'ddev start' as a DDEV project’s configuration is present in the repo. This will kick off the Mautic first-run process which will automatically install dependencies and configure Mautic for use. ✨ 🚀 Read more [here][ddev-mautic]

Installing Mautic is a simple three-step process:

1. [Download the repository zip][download-zip] then extract the zip to your web root.
2. Run the `composer install` command to install the required packages.
3. Open your browser and complete the installation through the web installer.

If you get stuck, check our our [general troubleshooting][troubleshooting] page. Still no joy? Join our lively [Mautic Community][community] for support and answers.

### User Documentation
Documentation on how to use Mautic is available at [docs.mautic.org][mautic-docs].

### Developer Docs
Developer documentation, including API reference docs, is available at [developer.mautic.org][dev-docs].


## Contributors ✨

Thanks goes to these wonderful people ([emoji key](https://allcontributors.org/docs/en/emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tbody>
    <tr>
      <td align="center" valign="top" width="14.28%"><a href="https://twitter.com/dennisameling"><img src="https://avatars.githubusercontent.com/u/17739158?v=4?s=100" width="100px;" alt="Dennis Ameling"/><br /><sub><b>Dennis Ameling</b></sub></a><br /><a href="https://github.com/mautic/mautic/commits?author=dennisameling" title="Code">💻</a> <a href="#userTesting-dennisameling" title="User Testing">📓</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://steercampaign.com"><img src="https://avatars.githubusercontent.com/u/12627658?v=4?s=100" width="100px;" alt="Mohammad Abu Musa"/><br /><sub><b>Mohammad Abu Musa</b></sub></a><br /><a href="https://github.com/mautic/mautic/commits?author=mabumusa1" title="Code">💻</a> <a href="#userTesting-mabumusa1" title="User Testing">📓</a> <a href="https://github.com/mautic/mautic/pulls?q=is%3Apr+reviewed-by%3Amabumusa1" title="Reviewed Pull Requests">👀</a></td>
      <td align="center" valign="top" width="14.28%"><a href="http://johnlinhart.com"><img src="https://avatars.githubusercontent.com/u/1235442?v=4?s=100" width="100px;" alt="John Linhart"/><br /><sub><b>John Linhart</b></sub></a><br /><a href="#userTesting-escopecz" title="User Testing">📓</a> <a href="https://github.com/mautic/mautic/pulls?q=is%3Apr+reviewed-by%3Aescopecz" title="Reviewed Pull Requests">👀</a> <a href="https://github.com/mautic/mautic/commits?author=escopecz" title="Code">💻</a> <a href="https://github.com/mautic/mautic/commits?author=escopecz" title="Tests">⚠️</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://www.webmecanik.com"><img src="https://avatars.githubusercontent.com/u/14075239?v=4?s=100" width="100px;" alt="Norman Pracht - Webmecanik"/><br /><sub><b>Norman Pracht - Webmecanik</b></sub></a><br /><a href="#userTesting-npracht" title="User Testing">📓</a> <a href="https://github.com/mautic/mautic/commits?author=npracht" title="Code">💻</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://webmecanik.com"><img src="https://avatars.githubusercontent.com/u/462477?v=4?s=100" width="100px;" alt="Zdeno Kuzmany"/><br /><sub><b>Zdeno Kuzmany</b></sub></a><br /><a href="#userTesting-kuzmany" title="User Testing">📓</a> <a href="https://github.com/mautic/mautic/pulls?q=is%3Apr+reviewed-by%3Akuzmany" title="Reviewed Pull Requests">👀</a> <a href="https://github.com/mautic/mautic/commits?author=kuzmany" title="Code">💻</a> <a href="https://github.com/mautic/mautic/commits?author=kuzmany" title="Tests">⚠️</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/stevedrobinson"><img src="https://avatars.githubusercontent.com/u/866855?v=4?s=100" width="100px;" alt="Steve Robinson"/><br /><sub><b>Steve Robinson</b></sub></a><br /><a href="#userTesting-stevedrobinson" title="User Testing">📓</a> <a href="https://github.com/mautic/mautic/issues?q=author%3Astevedrobinson" title="Bug reports">🐛</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/snoblucha"><img src="https://avatars.githubusercontent.com/u/265586?v=4?s=100" width="100px;" alt="Petr Šnobl"/><br /><sub><b>Petr Šnobl</b></sub></a><br /><a href="https://github.com/mautic/mautic/commits?author=snoblucha" title="Code">💻</a> <a href="https://github.com/mautic/mautic/issues?q=author%3Asnoblucha" title="Bug reports">🐛</a></td>
    </tr>ß
  </tbody>
</table>

<!-- markdownlint-restore -->
<!-- prettier-ignore-end -->

<!-- Footer:END -->

 [iTS In Co Git Hub repo][itsinco-git-repo] 

[mautic-blog]: <https://www.mautic.org/blog>
[get-involved]: <https://www.mautic.org/community/get-involved>
[twitter]: <https://twitter.com/MauticCommunity>
[facebook]: <https://www.facebook.com/MauticCommunity/>
[slack]: <https://www.mautic.org/community/get-involved/communication-channels>
[contributing]: <https://contribute.mautic.org/contributing-to-mautic>
[contributing-md]: <https://github.com/mautic/mautic/blob/5.x/.github/CONTRIBUTING.md>
[contribute-developer]: <https://contribute.mautic.org/contributing-to-mautic/developer>
[t1-issues]: <https://github.com/mautic/mautic/issues?q=is%3Aissue+is%3Aopen+label%3AT1>
[download-mautic]: <https://www.mautic.org/download>
[tagged-release]: <https://github.com/mautic/mautic/releases>
[composer]: <http://getcomposer.org/>
[download-zip]: <https://github.com/mautic/mautic/archive/refs/heads/features.zip>
[ddev-mautic]: <https://kb.mautic.org/article/how-to-set-up-a-mautic-instance-for-testing-locally-with-ddev.html>
[troubleshooting]: <https://docs.mautic.org/en/troubleshooting>
[community]: <https://www.mautic.org/community>
[mautic-docs]: <https://docs.mautic.org>
[dev-docs]: <https://devdocs.mautic.org>
[itsinco-git-repo]: <https://github.com/orgs/itsin-co-in>
