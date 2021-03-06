<?php

$dictionary['sms77_sms'] = [
    'audited' => false,
    'comment' => 'SMS sent via sms77',
    'duplicate_merge' => false,
    'fields' => [
        'contact_id' => [
            'audited' => false,
            'comment' => 'The receiving contact',
            'isnull' => true,
            'len' => '36',
            'name' => 'contact_id',
            'type' => 'char',
            'vname' => 'LBL_CONTACT_ID',
        ],
        'lead_id' => [
            'audited' => false,
            'comment' => 'The receiving lead',
            'isnull' => true,
            'len' => '36',
            'name' => 'lead_id',
            'type' => 'char',
            'vname' => 'LBL_LEAD_ID',
        ],
        'recipient' => [
            'audited' => false,
            'comment' => 'The message recipient(s)',
            'isnull' => false,
            'name' => 'recipient',
            'type' => 'text',
            'vname' => 'LBL_SMS77_RECIPIENTS',
        ],
        'sender' => [
            'audited' => false,
            'comment' => 'The sender identifier',
            'isnull' => true,
            'name' => 'sender',
            'type' => 'varchar',
            'vname' => 'LBL_SMS77_FROM',
        ],
        'text' => [
            'audited' => false,
            'comment' => 'The message text',
            'isnull' => false,
            'name' => 'text',
            'type' => 'text',
            'vname' => 'LBL_SMS77_SENDER',
        ],
    ],
    'table' => 'sms77_sms',
    'unified_search' => false,
    'unified_search_default_enabled' => false,
    'optimistic_locking' => true,
];

if (!class_exists('VardefManager'))
    require_once 'include/SugarObjects/VardefManager.php';

VardefManager::createVardef(
    'sms77_sms',
    'sms77_sms',
    [
        'basic',
        'security_groups',
    ]
);