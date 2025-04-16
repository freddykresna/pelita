<?php

namespace App\Domains\SMS\Services;

use App\Domains\SMS\Contracts\SMSClientInterface;

class VonageClient implements SMSClientInterface
{
    function sendSMS(string $phone, string $message)
    {
    }
}
