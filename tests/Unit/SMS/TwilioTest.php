<?php

use Illuminate\Support\Facades\App;
use App\Domains\SMS\Services\SMSService;
use Tests\Fakes\FakeTwilioClient;

test('twilio send text', function () {
    $smsService = new SMSService(new FakeTwilioClient());
    $response = $smsService->sendSMS('+441234567890', 'Happy Birthday');

    expect($response['body'])->toBe('Happy Birthday');
});
