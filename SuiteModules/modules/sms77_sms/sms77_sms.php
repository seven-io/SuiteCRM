<?php

class sms77_sms extends Basic {
    public $contact_id; // non CRM field
    public $created_by;
    public $created_by_link;
    public $created_by_name;
    public $date_entered;
    public $date_modified;
    public $deleted;
    public $description;
    public $id;
    public $importable = false;
    public $lead_id; // non CRM field
    public $modified_by_name;
    public $modified_user_id;
    public $modified_user_link;
    public $module_dir = 'sms77_sms';
    public $name;
    public $new_schema = true;
    public $object_name = 'sms77_sms';
    public $recipient; // non CRM field
    public $SecurityGroups;
    public $sender; // non CRM field
    public $table_name = 'sms77_sms';
    public $text; // non CRM field

    public function bean_implements($interface) {
        switch ($interface) {
            case 'ACL':
                return true;
        }

        return false;
    }
}