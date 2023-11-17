<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'modules/Employees/views/view.detail.php';
require_once 'modules/seven/seven_util.php';

class CustomEmployeesViewDetail extends EmployeesViewDetail {
    public function display() {
        global $sugar_config;

        $history = array_merge($this->getOutboundSms(), $this->getInboundSms());

        usort($history, function (SugarBean $a, SugarBean $b) {
            return strcmp($a->date_entered, $b->date_entered);
        });

        /** @var Employee $employee */
        $employee = $this->bean;
        $this->ss->assign('SEVEN_BEAN_ID', $this->bean->id);
        $this->ss->assign('SEVEN_FROM', $sugar_config['seven_sender'] ?? '');
        $this->ss->assign('SEVEN_MODULE', $this->module);
        $this->ss->assign('SEVEN_SMS_HISTORY', $history);
        $this->ss->assign('SEVEN_TO', $employee->phone_mobile);

        echo $this->ss->fetch('modules/seven/tpls/sms_compose.tpl');

        parent::display();
    }

    private function getInboundSms(): array {
        return seven_util::getSMS('seven_sms_inbound', $this->bean);
    }

    private function getOutboundSms(): array {
        return seven_util::getSMS('seven_sms', $this->bean);
    }
}
