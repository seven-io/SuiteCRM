<?php
require_once 'sms77_util.php';

$data = $_POST['data'] ?? null;

if ('sms_mo' !== $_POST['webhook_event'] ?? null || !$data) return;

/** @var sms77_sms_inbound $inbound */
$inbound = BeanFactory::newBean('sms77_sms_inbound');
$inbound->inbound_number = $data['system'] ?? null;
$inbound->msg_id = $data['id'] ?? null;
$inbound->msg_text = $data['text'] ?? null;
$inbound->msg_time = $data['time'] ?? null;
$inbound->sender = $data['sender'] ?? null;

setBeanID($inbound);

$inbound->save();

function setBeanID(sms77_sms_inbound $inbound): void {
    $phone = sms77_util::stripPhone($inbound->sender);
    $contact = sms77_util::getBeanByPhone('Contacts', $phone);

    if ($contact) {
        /** @var Contact $contact */
        $inbound->contact_id = $contact->id;
    } else {
        $lead = sms77_util::getBeanByPhone('Leads', $phone);

        if ($lead) {
            /** @var Lead $lead */
            $inbound->lead_id = $lead->id;
        }
    }
}