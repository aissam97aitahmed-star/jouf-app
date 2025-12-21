<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacilitySeeder extends Seeder
{
     public function run(): void
    {
        $facilities = [
            'غرف تبديل الملابس',
            'عيادة طبية',
            'إدارة عامة',
            'موقف سيارات',
            'كافتيريا',
            'قاعة اجتماعات',
            'مخزن معدات',
            'نقطة أمن',
        ];

        foreach ($facilities as $facility) {
            Facility::firstOrCreate([
                'name' => $facility,
            ]);
        }
    }
}
