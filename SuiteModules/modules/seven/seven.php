<?php

class seven {
    /**
     * @var bool $active
     */
    protected $active = false;

    /**
     * @var string|null $apiKey
     */
    protected $apiKey;

    /**
     * @var string|null $contact
     */
    protected $contact = null;

    /**
     * @var string|null $lead
     */
    protected $lead = null;

    /**
     * @var bool $leadActive
     */
    protected $leadActive = false;

    /**
     * @var string|null $leadBody
     */
    protected $leadBody;

    /**
     * @var string|null $number
     */
    protected $number;

    /**
     * @var Contact|Lead|null $relation
     */
    protected $relation = null;

    /**
     * @var string|null $sender
     */
    protected $sender;

    /**
     * @var bool $templateActive
     */
    protected $templateActive = false;

    /**
     * @var string|null $templateBody
     */
    protected $templateBody;

    /**
     * @var bool $isDev
     */
    private $isDev;

    public function __construct() {
        global $sugar_config;

        $this->isDev = true === ($sugar_config['developerMode'] ?? false);

        $this->setActive($sugar_config['seven_active'] ?? false);
        $this->setApiKey($sugar_config['seven_api_key'] ?? '');
        $this->setLeadActive($sugar_config['seven_lead_active'] ?? false);
        $this->setLeadBody($sugar_config['seven_lead_body'] ?? '');
        $this->setSender($sugar_config['seven_sender'] ?? '');
        $this->setTemplateActive($sugar_config['seven_template_active'] ?? false);
        $this->setTemplateBody($sugar_config['seven_template_body'] ?? '');

        if ($this->isDev) openlog('seven', LOG_NDELAY | LOG_PID, LOG_LOCAL0);
    }

    public function __destruct() {
        if ($this->isDev) closelog();
    }

    public function getTemplateActive(): bool {
        return $this->templateActive;
    }

    public function setTemplateActive(string $templateActive): self {
        $this->templateActive = 'yes' === $templateActive;
        return $this;
    }

    public function getTemplateBody(): ?string {
        return $this->templateBody;
    }

    public function setTemplateBody(string $templateBody): self {
        $this->templateBody = $templateBody;
        return $this;
    }

    public function getLeadActive(): bool {
        return $this->leadActive;
    }

    public function setLeadActive(string $leadActive): self {
        $this->leadActive = 'yes' === $leadActive;
        return $this;
    }

    public function getLeadBody(): ?string {
        return $this->leadBody;
    }

    public function setLeadBody(string $leadBody): self {
        $this->leadBody = $leadBody;
        return $this;
    }

    public function sendSMS(): array {
        return $this->apiCall(
            $this->getSender(),
            $_POST['message'],
            $this->getNumber()
        );
    }

    public function apiCall($from, $text, $to): array {
        if (!$this->getActive()) return [null, null];

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
        $curl = curl_init('https://gateway.seven.io/api/sms');
        curl_setopt_array($curl, $curlOpts);
        $response = curl_exec($curl);
        curl_close($curl);

        /** @var seven_sms $smsBean */
        $smsBean = BeanFactory::newBean('seven_sms');
        $smsBean->recipient = $to;
        $smsBean->sender = $from;
        $smsBean->text = $text;
        if ($this->relation instanceof Contact) $smsBean->contact_id = $this->relation->id;
        elseif ($this->relation instanceof Lead) $smsBean->lead_id = $this->relation->id;
        $smsBean->save();

        return [json_decode($response, true), $smsBean->toArray()];
    }

    public function getActive(): bool {
        return $this->active;
    }

    public function setActive(string $active): self {
        $this->active = 'yes' === $active;
        return $this;
    }

    public function getApiKey(): ?string {
        return $this->apiKey;
    }

    public function setApiKey(string $apiKey): self {
        $this->apiKey = $apiKey;
        return $this;
    }

    public function getSender(): ?string {
        return $this->sender;
    }

    public function setSender($sender): self {
        $this->sender = $sender;
        return $this;
    }

    public function getNumber(): ?string {
        return $this->number;
    }

    public function setNumber(string $number): self {
        $this->number = $number;
        return $this;
    }

    public function getContactBean() {
        return $this->contact ? BeanFactory::getBean('Contacts', $this->contact) : null;
    }

    public function getLeadBean() {
        return $this->lead ? BeanFactory::getBean('Leads', $this->lead) : null;
    }

    public function getContact(): ?string {
        return $this->contact;
    }

    public function setContact(Contact $contact): self {
        $this->contact = $contact;
        return $this;
    }

    public function getLead(): ?string {
        return $this->lead;
    }

    public function setLead(Lead $lead): self {
        $this->lead = $lead;
        return $this;
    }

    public function getRelation() {
        return $this->relation;
    }

    public function setRelation($relation): self {
        $this->relation = $relation;
        return $this;
    }
}
