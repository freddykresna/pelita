<?php

namespace Tests\Fakes;

use App\Domains\SMS\Contracts\SMSClientInterface;
use Twilio\Http\Client;

class FakeTwilioClient implements SMSClientInterface
{
    public function sendSMS(string $phone, string $message): array
    {
        return ['errorCode' => null, 'errorMessage' => null, 'body' => $message, 'to' => $phone];
    }
}
