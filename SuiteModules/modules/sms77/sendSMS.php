<?php
error_reporting(0);
global $sugar_config;
require_once 'sms77.php';
$sms = new sms77;
foreach ([
             'sms77_active' => 'setActive',
             'sms77_api_key' => 'setApiKey',
             'sms77_lead_active' => 'setLeadActive',
             'sms77_lead_body' => 'setLeadBody',
             'sms77_sender' => 'setSender',
             'sms77_template_active' => 'setTemplateActive',
             'sms77_template_body' => 'setTemplateBody',
         ] as $option => $setter)
    if (isset($sugar_config[$option])) $sms->$setter($sugar_config[$option]);

if (!empty($_POST['number'])) {
    $sms->setNumber($_POST['number']);
    $sms->sendSMS();
}
