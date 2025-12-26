<?php

namespace Database\Seeders;

use App\Models\BotFaq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BotFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'ما هي ساعات العمل الرسمية؟',
                'answer'   => 'ساعات العمل الرسمية من الساعة 9 صباحًا إلى 5 مساءً من يوم الإثنين إلى الجمعة.',
                'views'    => 0,
                'is_active' => true,
            ],
            [
                'question' => 'كيف أتواصل مع قسم الموارد البشرية؟',
                'answer'   => 'يمكنك التواصل مع الموارد البشرية عبر البريد الإلكتروني hr@company.com أو من خلال مكتب الموارد البشرية.',
                'views'    => 0,
                'is_active' => true,
            ],
            [
                'question' => 'ما هي المستندات المطلوبة عند التوظيف؟',
                'answer'   => 'بطاقة التعريف الوطنية، نسخة من الشهادة الدراسية، والسيرة الذاتية.',
                'views'    => 0,
                'is_active' => true,
            ],
            [
                'question' => 'كيف أطلب إجازة؟',
                'answer'   => 'يمكنك تقديم طلب الإجازة من خلال النظام الداخلي أو التواصل مباشرة مع مديرك المباشر.',
                'views'    => 0,
                'is_active' => true,
            ],
            [
                'question' => 'أين يوجد موقف السيارات؟',
                'answer'   => 'موقف السيارات مخصص للموظفين خلف المبنى الرئيسي، ويُرجى الالتزام بالأماكن المحددة.',
                'views'    => 0,
                'is_active' => true,
            ],
            [
                'question' => 'كيف أغير كلمة المرور الخاصة بي؟',
                'answer'   => 'يمكنك تغيير كلمة المرور من صفحة الإعدادات في حسابك الشخصي.',
                'views'    => 0,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            BotFaq::updateOrCreate(
                ['question' => $faq['question']],
                $faq
            );
        }
        $this->command->info('Bot Faqs Created!');
    }
}
