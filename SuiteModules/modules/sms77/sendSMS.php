<?php
require_once 'sms77.php';

$sms = new sms77;

$number = $_POST['number'] ?? '';
$id = $_POST['id'] ?? '';
$module = $_POST['module'] ?? '';

if (!empty($number)) {
    if (!empty($module) && !empty($id)) {
        $bean = BeanFactory::getBean($module);
        $sms->setRelation($bean->retrieve($id));
    }

    $sms->setNumber($number);

    echo json_encode($sms->sendSMS());
}
