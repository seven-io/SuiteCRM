<?php

$dictionary['sms77_sms_inbound'] = [
    'audited' => false,
    'comment' => 'SMS received via sms77',
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
        'inbound_number' => [
            'audited' => false,
            'comment' => 'The inbound number',
            'isnull' => false,
            'name' => 'inbound_number',
            'type' => 'text',
            'vname' => 'LBL_SMS77_RECIPIENTS',
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
        'msg_id' => [
            'audited' => false,
            'comment' => 'The gateway message ID',
            'isnull' => false,
            'name' => 'msg_id',
            'type' => 'varchar',
            'vname' => 'LBL_SMS77_ID',
        ],
        'msg_text' => [
            'audited' => false,
            'comment' => 'The message text',
            'isnull' => false,
            'name' => 'msg_text',
            'type' => 'text',
            'vname' => 'LBL_SMS77_SENDER',
        ],
        'msg_time' => [
            'audited' => false,
            'comment' => 'The timestamp for receiving the message',
            'isnull' => false,
            'name' => 'msg_time',
            'type' => 'varchar',
            'vname' => 'LBL_SMS77_TIMESTAMP',
        ],
        'sender' => [
            'audited' => false,
            'comment' => 'The sender identifier',
            'isnull' => true,
            'name' => 'sender',
            'type' => 'varchar',
            'vname' => 'LBL_SMS77_FROM',
        ],
    ],
    'table' => 'sms77_sms_inbound',
    'unified_search' => false,
    'unified_search_default_enabled' => false,
    'optimistic_locking' => true,
];

if (!class_exists('VardefManager'))
    require_once 'include/SugarObjects/VardefManager.php';

VardefManager::createVardef(
    'sms77_sms_inbound',
    'sms77_sms_inbound',
    [
        'basic',
        'security_groups',
    ]
);