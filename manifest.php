<?php

$manifest = [
    'acceptable_sugar_flavors' => [
        'CE',
        'CORP',
        'ENT',
        'PRO',
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
    'author' => 'sms77 e.K.',
    'description' => 'Send SMS via sms77',
    'icon' => 'logo.svg',
    'is_uninstallable' => true,
    'key' => '',
    'name' => 'sms77',
    'published_date' => 'December 06, 2021',
    'readme' => '',
    'remove_tables' => 'prompt',
    'type' => 'module',
    'version' => 'v0.2.0',
];

$installdefs = [
    'beans' => [
        [
            'class' => 'sms77_sms',
            'module' => 'sms77_sms',
            'path' => 'modules/sms77_sms/sms77_sms.php',
            'tab' => false,
        ],
        [
            'class' => 'sms77_sms_inbound',
            'module' => 'sms77_sms_inbound',
            'path' => 'modules/sms77_sms_inbound/sms77_sms_inbound.php',
            'tab' => false,
        ],
    ],
    'copy' => [
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Administration',
            'to' => 'custom/Extension/modules/Administration',
        ],
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Users',
            'to' => 'custom/Extension/modules/Users',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/sms77',
            'to' => 'modules/sms77',
        ],
        [
            'from' => '<basepath>/SuiteModules/EntryPoint',
            'to' => 'custom/Extension/application/Ext/EntryPointRegistry',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/sms77_sms',
            'to' => 'modules/sms77_sms',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/sms77_sms_inbound',
            'to' => 'modules/sms77_sms_inbound',
        ],
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Contacts',
            'to' => 'custom/Extension/modules/Contacts',
        ],
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Leads',
            'to' => 'custom/Extension/modules/Leads',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/Contacts',
            'to' => 'custom/modules/Contacts',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/Leads',
            'to' => 'custom/modules/Leads',
        ],
    ],
    'id' => 'sms77',
    'logic_hooks' => [
        [
            'class' => 'FeedPusher',
            'description' => 'Contacts SMS Feed Pusher',
            'file' => 'modules/sms77/FeedPusher.php',
            'function' => 'pushFeed',
            'hook' => 'before_save',
            'module' => 'Contacts',
            'order' => 101,
        ],
        [
            'class' => 'FeedPusher',
            'description' => 'Leads SMS Feed Pusher',
            'file' => 'modules/sms77/FeedPusher.php',
            'function' => 'pushFeed',
            'hook' => 'before_save',
            'module' => 'Leads',
            'order' => 102,
        ],
    ],
];

$upgrade_manifest = [];
