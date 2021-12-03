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
    'version' => 'v0.0.1',
];

$installdefs = [
    'administration' => [],
    'copy' => [
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Administration/Ext/',
            'to' => 'custom/Extension/modules/Administration/Ext',
        ],
        [
            'from' => '<basepath>/SuiteModules/Extension/modules/Users/Ext/Language',
            'to' => 'custom/Extension/modules/Users/Ext/Language',
        ],
        [
            'from' => '<basepath>/SuiteModules/modules/sms77',
            'to' => 'modules/sms77',
        ],
        [
            'from' => '<basepath>/SuiteModules/EntryPoint/sms77.php',
            'to' => 'custom/Extension/application/Ext/EntryPointRegistry/sms77.php',
        ],
    ],
    'custom_fields' => [
        [
            'audited' => false,
            'comment' => '',
            'default_value' => '',
            'duplicate_merge' => false,
            'help' => 'Enter Your Extension',
            'id' => 'extension_id',
            'importable' => true,
            'label' => 'LBL_SMS77_EXTENSION',
            'max_size' => 10,
            'module' => 'Users',
            'name' => 'sms77',
            'reportable' => false,
            'required' => false,
            'type' => 'varchar',
        ],
    ],
    'id' => 'sms77',
    'logic_hooks' => [
        [
            'class' => 'RenderSmsButtons',
            'description' => 'sms77 SMS',
            'file' => 'modules/sms77/RenderSmsButtons.php',
            'function' => 'render',
            'hook' => 'after_ui_footer',
            'module' => '',
            'order' => 100,
        ],
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
    'mkdir' => [],
];

$upgrade_manifest = [];
