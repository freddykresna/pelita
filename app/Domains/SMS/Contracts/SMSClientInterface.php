<?php

namespace App\Domains\SMS\Contracts;

interface SMSClientInterface
{
    function sendSMS(string $phone, string $message);
}
