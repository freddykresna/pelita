<?php

namespace App\Domains\SMS\Services;

use App\Domains\SMS\Contracts\SMSClientInterface;

class SMSService
{
    protected SMSClientInterface $smsClient;

    public function __construct(SMSClientInterface $smsClient)
    {
        $this->smsClient = $smsClient;
    }

    public function sendSMS(string $phone, string $message)
    {
        return $this->smsClient->sendSMS($phone, $message);
    }
}
