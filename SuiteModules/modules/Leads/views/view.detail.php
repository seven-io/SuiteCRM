<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'modules/Leads/views/view.detail.php';
require_once 'modules/sms77/sms77_util.php';

class CustomLeadsViewDetail extends LeadsViewDetail {
    public function display() {
        global $sugar_config;

        $history = array_merge($this->getOutboundSms(), $this->getInboundSms());

        usort($history, function (SugarBean $a, SugarBean $b) {
            return strcmp($a->date_entered, $b->date_entered);
        });

        /** @var Lead $bean */
        $bean = $this->bean;
        $this->ss->assign('SMS77_BEAN_ID', $this->bean->id);
        $this->ss->assign('SMS77_FROM', $sugar_config['sms77_sender'] ?? '');
        $this->ss->assign('SMS77_MODULE', $this->module);
        $this->ss->assign('SMS77_SMS_HISTORY', $history);
        $this->ss->assign('SMS77_TO', $bean->phone_mobile);

        echo $this->ss->fetch('modules/sms77/tpls/sms_compose.tpl');

        parent::display();
    }

    private function getInboundSms(): array {
        return sms77_util::getSMS('sms77_sms_inbound', $this->bean);
    }

    private function getOutboundSms(): array {
        return sms77_util::getSMS('sms77_sms', $this->bean);
    }
}