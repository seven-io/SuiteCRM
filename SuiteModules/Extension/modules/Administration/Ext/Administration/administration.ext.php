<?php
//WARNING: The contents of this file are auto-generated

$admin_options_defs = [];
$admin_options_defs['Administration']['Configuration1'] = [
    'PANELSETTINGS',
    'LBL_SMS77_CONFIGURATION_TITLE',
    'LBL_SMS77_CONFIGURATION_DESC',
    './index.php?module=sms77&action=index',
];
$admin_options_defs['Administration']['Configuration2'] = [
    'PANELSETTINGS',
    'LBL_SMS77_TEMPLATE_CONFIGURATION_TITLE',
    'LBL_SMS77_TEMPLATE_CONFIGURATION_DESC',
    './index.php?module=sms77&action=template',
];
$admin_options_defs['Administration']['Configuration3'] = [
    'PANELSETTINGS',
    'LBL_SMS77_LEAD_CONFIGURATION_TITLE',
    'LBL_SMS77_LEAD_CONFIGURATION_DESC',
    './index.php?module=sms77&action=lead',
];

$admin_group_header[] = [
    'LBL_SMS77_TITLE',
    'LBL_SMS77_DESC',
    false,
    $admin_options_defs,
];

?>
