<?php

namespace App\Enums;

enum SMSProvider: string
{
    case TWILIO = 'twilio';
    case VONAGE = 'vonage';
}
