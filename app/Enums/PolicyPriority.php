<?php

namespace App\Enums;

enum PolicyPriority: string
{
    case LOW    = 'منخفضة';
    case MEDIUM = 'متوسطة';
    case HIGH   = 'عالية';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
