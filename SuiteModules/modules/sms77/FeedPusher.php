<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'modules/SugarFeed/feedLogicBase.php';
error_reporting(0);

class FeedPusher extends FeedLogicBase {
    public $module = 'Contacts';

    private function getPhoneNumbers($phones) {
        $numbers = [];

        foreach ($phones as $phone)
            if ($this->isValidPhoneNumber($phone)) $numbers[] = $phone;

        return $numbers;
    }

    public function pushFeed($bean, $event, $arguments) {
        global $locale, $sms;

        if (!empty($bean->fetched_row)) return;
        if ($_REQUEST['module']) $this->module = $_REQUEST['module'];

        $officePhone = $bean->phone_work;
        $mobilePhone = $bean->phone_mobile;
        $fullName = $locale->getLocaleFormattedName($bean->first_name, $bean->last_name);
        $fullName = trim($fullName);
        [$firstName, $lastName] = explode(' ', $fullName);

        require_once 'modules/sms77/sendSMS.php'; // initializes $sms

        if ('Contacts' === $this->module) {
            $templateActive = $sms->getTemplateActive();
            $template = $sms->getTemplateBody();
        } elseif ('Leads' === $this->module) {
            $templateActive = $sms->getLeadActive();
            $template = $sms->getLeadBody();
        } else {
            $templateActive = 'no';
            $template = '';
        }

        $numbers = $this->getPhoneNumbers([$mobilePhone, $officePhone]);

        if ('yes' === $templateActive && count($numbers)) {
            $msg = str_replace([
                '{first-name}',
                '{last-name}',
                '{full-name}',
                '{office-phone}',
                '{mobile-number}',
                '{job-title}',
                '{department}',
                '{account-name}',
                '{email}',
                '{primary-address}',
                '{primary-city}',
                '{primary-state}',
                '{primary-postalcode}',
                '{primary-country}',
                '{alter-address}',
                '{alter-city}',
                '{alter-state}',
                '{alter-postalcode}',
                '{alter-country}',
                '{description}',
                '{date}',
            ], [
                $firstName,
                $lastName,
                $bean->first_name . ' ' . $bean->last_name,
                $officePhone,
                $mobilePhone,
                $bean->title,
                $bean->department,
                $bean->account_name,
                $bean->email1,
                $bean->primary_address_street,
                $bean->primary_address_city,
                $bean->primary_address_state,
                $bean->primary_address_postalcode,
                $bean->primary_address_country,
                $bean->alt_address_street,
                $bean->alt_address_city,
                $bean->alt_address_state,
                $bean->alt_address_postalcode,
                $bean->alt_address_country,
                $bean->description,
                date('d/m/Y'),
            ], trim($template));

            $sms->apiCall($sms->getSender(), $msg, implode(',', $numbers));
        }

        SugarFeed::pushFeed2('{SugarFeed.CREATED_CONTACT} [' . $bean->module_dir . ':'
            . $bean->id . ':' . $fullName . ']', $bean);
    }

    private function isValidPhoneNumber($phone) {
        return !empty($phone) && strlen($phone) >= 9;
    }
}
