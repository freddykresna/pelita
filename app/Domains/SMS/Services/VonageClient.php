<?php

namespace App\Domains\SMS\Services;

use App\Domains\SMS\Contracts\SMSClientInterface;

class VonageClient implements SMSClientInterface
{
    public function sendSMS(string $phone, string $message) {}
}
