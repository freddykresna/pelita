<?php

namespace App\Domains\SMS\Contracts;

interface SMSClientInterface
{
    public function sendSMS(string $phone, string $message);
}
