<?php
require_once 'seven.php';

$sms = new seven;

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
