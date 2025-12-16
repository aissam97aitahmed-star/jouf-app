<?php

namespace App\Enums;

enum Department: string
{
    case MAINTENANCE            = 'الصيانة';
    case IT                     = 'تقنية المعلومات';
    case HR                     = 'الموارد البشرية';
    case PROCUREMENT            = 'المشتريات';
    case WAREHOUSES             = 'المستودعات';
    case SALES                  = 'المبيعات';

    case INDUSTRIAL_OIL          = 'المجمع الصناعي - مصنع الزيت';
    case INDUSTRIAL_PICKLES     = 'المجمع الصناعي - مصنع المخلل';
    case INDUSTRIAL_POTATOES    = 'المجمع الصناعي - مصنع البطاطس';

    case FINANCE                = 'الإدارة المالية';
    case QUALITY                = 'إدارة الجودة';
    case SAFETY                 = 'إدارة الأمن والسلامة';
    case AGRICULTURE            = 'الشؤون الزراعية';
    case LEGAL                  = 'الشؤون القانونية';
    case CEO_OFFICE             = 'مكتب الرئيس التنفيذي';
    case TRANSPORT              = 'إدارة النقل';
    case INTERNAL_AUDIT         = 'المراجعة الداخلية';

    /**
     * إرجاع القيم لاستخدامها في migration و validation
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
