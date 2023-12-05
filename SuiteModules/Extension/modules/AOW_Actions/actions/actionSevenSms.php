<?php /** @noinspection PhpUnused */

require_once __DIR__ . '/../../../../modules/AOW_Actions/actions/actionBase.php';

class actionSevenSms extends actionBase {
    public function __construct($id = '') {
        parent::__construct($id);
    }

    public function loadJS() {
        return [];
    }

    public function edit_display($line, SugarBean $bean = null, $params = []) {
        return "<input maxlength='16' name='aow_actions_param[" . $line . "][from]' placeholder='"
            . translate('LBL_SEVENSMS_FROM', 'AOW_Actions') . "' type='tel' value=' " . $params['from']
            . "'>"
            . "<textarea cols='110' name='aow_actions_param[" . $line . "][text]' placeholder='"
            . translate('LBL_SEVENSMS_TEXT', 'AOW_Actions') . "' rows='5'>" . $params['text']
            . "</textarea>";
    }

    protected function getPhoneFromParams(SugarBean $bean, array $params): ?string {
        switch ($bean->module_name) {
            case 'Accounts':
                /** @var Account $bean */

                return $bean->phone_alternate;
            case 'Contacts':
                /** @var Contact $bean */

                return $bean->phone_mobile;
            case 'Employees':
                /** @var Employee $bean */

                return $bean->phone_mobile;
            case 'Leads':
                /** @var Lead $bean */

                return $bean->phone_mobile;
            case 'Users':
                /** @var User $bean */

                return $bean->phone_mobile;
            default:
                return null;
        }
    }

    /**
     * Return true on success otherwise false.
     * Use actionSevenSms::getLastMessagesSuccess() and actionSevenSms::getLastMessagesFailed()
     * methods to get last SMS sending status
     * @param SugarBean $bean
     * @param array $params
     * @param bool $in_save
     * @return boolean
     */
    public function run_action(SugarBean $bean, $params = [], $in_save = false) {
        global $sugar_config;

        $to = $this->getPhoneFromParams($bean, $params);
        if (!$to) return false;

        $apiKey = $sugar_config['seven_api_key'];
        if (!$apiKey) return false;

        $text = $params['text'];
        $from = $params['from'];

        $ch = curl_init('https://gateway.seven.io/api/sms');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(compact('from', 'text', 'to')));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-type: application/json',
            'X-Api-Key: ' . $sugar_config['seven_api_key'],
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);
        curl_close($ch);

        return 100 === $result->success;
    }
}
