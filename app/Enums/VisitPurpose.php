<?php

namespace App\Enums;

enum VisitPurpose: string
{
    case WORK_VISIT      = 'زيارة عمل';
    case DELIVERY        = 'تسليم طرود';
    case MAINTENANCE     = 'صيانة وخدمات';
    case PERSONAL_VISIT  = 'زيارة شخصية';
    case MEETING         = 'اجتماع';
    case EVENT_ATTEND    = 'حضور مناسبة';
    case OFFICIAL_INVITE = 'دعوة رسمية';

    /**
     * لإرجاع كل القيم لاستخدامها في الفورم
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
