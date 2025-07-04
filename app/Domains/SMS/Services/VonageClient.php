<?php

namespace App\Domains\SMS\Services;

use App\Domains\SMS\Contracts\SMSClientInterface;
use Illuminate\Support\Facades\Log;
use Psr\Http\Client\ClientExceptionInterface;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\Client\Exception\Exception;
use Vonage\SMS\Message\SMS;

class VonageClient implements SMSClientInterface
{
    protected Client $client;

    public function __construct()
    {
        $credentials = new Basic(config('services.vonage.key'), config('services.vonage.secret'));
        $this->client = new Client($credentials);
    }

    public function sendSMS(string $phone, string $message): array
    {
        try {
            $text = new SMS($phone, config('vonage.from'), $message);
            $message = $this->client->sms()->send($text);

            return [
                'message_id' => $message->current()->getMessageId(),
                'status' => $message->current()->getStatus(),
            ];

        } catch (ClientExceptionInterface $e) {
            Log::error($e->getMessage());

            return ['errorCode' => $e->getCode(), 'errorMessage' => $e->getMessage()];
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return ['errorCode' => $e->getCode(), 'errorMessage' => $e->getMessage()];
        }
    }
}
