<?php

namespace Database\Seeders;

use App\Models\BotOption;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BotOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BotOption::insert([
            [
                'option_number' => 1,
                'title' => 'الحصول على اتجاهات ومواقع الشركة',
                'content' => "اتجاهات ومواقع الشركة:\n- الفرع الرئيسي: شارع النجاح\n- فرع الرياض: شارع الملك فهد",
            ],
            [
                'option_number' => 2,
                'title' => 'معرفة سياسات الشركة حسب قسمك',
                'content' => "سياسات الشركة:\nيرجى مراجعة دليل السياسات الداخلي",
            ],
            [
                'option_number' => 3,
                'title' => 'التحدث مع الموارد البشرية',
                'content' => "يمكنك التواصل مع HR عبر:\nhr@company.com",
            ],
        ]);
    }
}
