<?php

namespace App\Enums;

enum VisitDuration: string
{
    case MIN_30     = '30 دقيقة';
    case HOUR_1     = 'ساعة واحدة';
    case HOUR_2     = 'ساعتان';
    case HALF_DAY   = 'نصف يوم';
    case FULL_DAY   = 'يوم كامل';
    case MULTI_DAY  = 'أكثر من يوم';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
