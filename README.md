![](https://www.seven.io/wp-content/uploads/Logo.svg "seven Logo")

# [seven](https://www.seven.io/) SMS module for Suite CRM

This module requires at least PHP 7.3.
Only tested with SuiteCRM 7.x, but it should work well with 6.x too.

## Installation

- Download latest release
- Navigate to Suite CRM `Module Loader` located in Suite CRM Admin Panel.
- Upload the download zip file and click the `Install` button. It will take a couple of
  seconds to install.
- Navigate to `Admin`, click `seven API Configuration`, fill in your API key and save.

### Usage

- Go to a contact and click the envelope icon for composing a message.
- Use `Contact Template Configuration`  for sending SMS when a new contact gets created.
- Use `Lead Template Configuration`  for sending SMS when a new lead gets created.
- For inbound SMS, add a *sms_mo* webhook pointing to /index.php?entryPoint=seven_inbound

#### Support

Need help? Feel free to [contact us](https://www.seven.io/en/company/contact/).

[![MIT](https://img.shields.io/badge/License-MIT-teal.svg)](LICENSE)
