<?php

$manifest = [
    'acceptable_sugar_flavors' => [
        'CE',
        'CORP',
        'ENT',
        'PRO',
        'ULT',
    ],
    'acceptable_sugar_versions' => [
        'regex_matches' => [
            '6\.[0-9]\.\d',
            '7\.[0-9]\.\d',
        ],
    ],
    'acceptable_suitecrm_versions' => [
        'regex_matches' => [
            '6\.[0-9]{1,2}\.\d',
            '7\.[0-9]{1,2}\.\d',
        ],
    ],
    'author' => 'seven communications GmbH & Co. KG',
    'description' => 'Send SMS via seven',
    'icon' => 'logo.svg',
    'is_uninstallable' => true,
    'key' => '',
    'name' => 'seven',
    'published_date' => 'January 26, 2024',
    'readme' => '',
    'remove_tables' => 'prompt',
    'type' => 'module',
    'version' => 'v0.8.0',
];

$installdefs = [
    'beans' => [
        [
            'class' => 'seven_sms',
            'module' => 'seven_sms',
            'path' => 'modules/seven_sms/seven_sms.php',
            'tab' => false,
        ],
        [
            'class' => 'seven_sms_inbound',
            'module' => 'seven_sms_inbound',
            'path' => 'modules/seven_sms_inbound/seven_sms_inbound.php',
            'tab' => false,
        ],
        [
            'class' => 'seven_templates',
            'module' => 'seven_templates',
            'path' => 'modules/seven_templates/seven_templates.php',
            'tab' => false,
        ],
    ],
    'copy' => [
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Administration',
            'to' => 'custom/Extension/modules/Administration',
        ],
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Accounts',
            'to' => 'custom/Extension/modules/Accounts',
        ],
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Contacts',
            'to' => 'custom/Extension/modules/Contacts',
        ],
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Employees',
            'to' => 'custom/Extension/modules/Employees',
        ],
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Leads',
            'to' => 'custom/Extension/modules/Leads',
        ],
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/AOW_Actions',
            'to' => 'custom/Extension/modules/AOW_Actions',
        ],
        [
            'from' => '<basepath>/SuiteModules/custom/modules/AOW_Actions',
            'to' => 'custom/modules/AOW_Actions',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/seven',
            'to' => 'modules/seven',
        ],
        [
            'from' => '<basepath>/SuiteModules/EntryPoint',
            'to' => 'custom/Extension/application/Ext/EntryPointRegistry',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/seven_sms',
            'to' => 'modules/seven_sms',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/seven_sms_inbound',
            'to' => 'modules/seven_sms_inbound',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/seven_templates',
            'to' => 'modules/seven_templates',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/Accounts',
            'to' => 'custom/modules/Accounts',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/Contacts',
            'to' => 'custom/modules/Contacts',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/Employees',
            'to' => 'custom/modules/Employees',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/Leads',
            'to' => 'custom/modules/Leads',
        ],
    ],
    'id' => 'seven',
    'logic_hooks' => [
        [
            'class' => 'FeedPusher',
            'description' => 'Contacts SMS Feed Pusher',
            'file' => 'modules/seven/FeedPusher.php',
            'function' => 'pushFeed',
            'hook' => 'before_save',
            'module' => 'Contacts',
            'order' => 101,
        ],
        [
            'class' => 'FeedPusher',
            'description' => 'Leads SMS Feed Pusher',
            'file' => 'modules/seven/FeedPusher.php',
            'function' => 'pushFeed',
            'hook' => 'before_save',
            'module' => 'Leads',
            'order' => 102,
        ],
        [
            'class' => 'FeedPusher',
            'description' => 'Accounts SMS Feed Pusher',
            'file' => 'modules/seven/FeedPusher.php',
            'function' => 'pushFeed',
            'hook' => 'before_save',
            'module' => 'Accounts',
            'order' => 103,
        ],
        [
            'class' => 'FeedPusher',
            'description' => 'Employees SMS Feed Pusher',
            'file' => 'modules/seven/FeedPusher.php',
            'function' => 'pushFeed',
            'hook' => 'before_save',
            'module' => 'Employees',
            'order' => 104,
        ],
    ],
];

$upgrade_manifest = [];
