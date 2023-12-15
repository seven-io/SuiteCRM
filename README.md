<img src="https://www.seven.io/wp-content/uploads/Logo.svg" width="250" />

# [seven](https://www.seven.io/) SMS module for Suite CRM

This module requires at least PHP 7.4.
Only tested with SuiteCRM 7.x, but it should work well with 6.x too.

## Installation

- Download latest release
- Navigate to Suite CRM `Module Loader` located in Suite CRM Admin Panel.
- Upload the download zip file and click the `Install` button. It will take a couple of
  seconds to install.
- Navigate to `Admin`, click `seven API Configuration`, fill in your API key and save.

## Usage

- Go to a contact and click the envelope icon for composing a message.
- Use `Contact Template Configuration`  for sending SMS when a new contact gets created.
- Use `Lead Template Configuration`  for sending SMS when a new lead gets created.
- Use `Account Template Configuration`  for sending SMS when a new account gets created.
- For inbound SMS, add a *sms_mo* webhook pointing to /index.php?entryPoint=seven_inbound

### Placeholders

You can use the following placeholders in your messages (not workflows):

#### Contact / Lead

- {account-name}
- {alter-address}
- {alter-city}
- {alter-country}
- {alter-postalcode}
- {alter-state}
- {date}
- {department}
- {description}
- {email}
- {first-name}
- {full-name}
- {job-title}
- {last-name}
- {mobile-number}
- {office-phone}
- {primary-address}
- {primary-city}
- {primary-country}
- {primary-postalcode}
- {primary-state}

#### Account

- {account_type}
- {annual_revenue}
- {assigned_user_id}
- {billing_address_city}
- {billing_address_country}
- {billing_address_postalcode}
- {billing_address_state}
- {billing_address_street}
- {campaign_id}
- {created_by}
- {date_entered}
- {date_modified}
- {deleted}
- {description}
- {employees}
- {id}
- {industry}
- {modified_user_id}
- {name}
- {ownership}
- {parent_id}
- {phone_alternate}
- {phone_fax}
- {phone_office}
- {rating}
- {shipping_address_city}
- {shipping_address_country}
- {shipping_address_postalcode}
- {shipping_address_state}
- {shipping_address_street}
- {sic_code}
- {ticker_symbol}
- {website}

### Workflows
You can use the workflow action *sevenSms* to send SMS.
The action works with the following modules:
- Accounts
- Contacts
- Employees
- Leads
- Users

## Support

Need help? Feel free to [contact us](https://www.seven.io/en/company/contact/).

[![MIT](https://img.shields.io/badge/License-MIT-teal.svg)](LICENSE)
