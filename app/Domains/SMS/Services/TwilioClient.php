<?php

namespace App\Domains\SMS\Services;

use App\Domains\SMS\Contracts\SMSClientInterface;
use Log;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class TwilioClient implements SMSClientInterface
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client(config('services.twilio.sid'), config('services.twilio.token'));
    }

    public function sendSMS(string $phone, string $message): array
    {
        try {
            $message = $this->client->messages->create($phone, [
                'from' => config('twilio.from'),
                'body' => $message,
            ]);

            return ['errorCode' => $message->errorCode, 'errorMessage' => $message->errorMessage];
        } catch (TwilioException $e) {
            Log::error($e->getMessage());

            return ['errorCode' => $e->getCode(), 'errorMessage' => $e->getMessage()];
        }
    }
}
