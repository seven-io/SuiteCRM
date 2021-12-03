<?php

class sms77 {
    protected $active;
    protected $apiKey;
    protected $leadActive;
    protected $leadBody;
    protected $number;
    protected $sender;
    protected $templateActive;
    protected $templateBody;

    public function __construct() {
        openlog('sms77', LOG_NDELAY | LOG_PID, LOG_LOCAL0);
    }

    public function __destruct() {
        closelog();
    }

    public function getTemplateActive() {
        return $this->templateActive;
    }

    public function setTemplateActive($templateActive) {
        $this->templateActive = $templateActive;
        return $this;
    }

    public function getTemplateBody() {
        return $this->templateBody;
    }

    public function setTemplateBody($templateBody) {
        $this->templateBody = $templateBody;
        return $this;
    }

    public function getLeadActive() {
        return $this->leadActive;
    }

    public function setLeadActive($leadActive) {
        $this->leadActive = $leadActive;
        return $this;
    }

    public function getLeadBody() {
        return $this->leadBody;
    }

    public function setLeadBody($leadBody) {
        $this->leadBody = $leadBody;
        return $this;
    }

    public function sendSMS() {
        echo $this->apiCall(
            $this->getSender(),
            $_POST['message'],
            $this->getNumber()
        );
    }

    public function apiCall($from, $text, $to) {
        if ('yes' !== $this->getActive()) return null;

        $curlOpts = [
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Content-type: application/json',
                'X-Api-Key: ' . $this->getApiKey(),
                'SentWith: SuiteCRM',
            ],
            CURLOPT_POSTFIELDS => json_encode([
                'from' => $from,
                'text' => $text,
                'to' => $to,
            ]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 7500,
        ];
        $curl = curl_init('https://gateway.sms77.io/api/sms');
        curl_setopt_array($curl, $curlOpts);
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
        return $this;
    }

    public function getApiKey() {
        return $this->apiKey;
    }

    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
        return $this;
    }

    public function getSender() {
        return $this->sender;
    }

    public function setSender($sender) {
        $this->sender = $sender;
        return $this;
    }

    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = $number;
        return $this;
    }
}
