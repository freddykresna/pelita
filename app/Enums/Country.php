<?php

namespace App\Enums;

enum Country: string
{
    case US = 'United States';
    case ID = 'Indonesia';

    /**
     * Get the list of countries.
     */
    public static function getCountries(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }
}
