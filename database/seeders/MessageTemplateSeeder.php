<?php

namespace Database\Seeders;

use App\Models\MessageTemplate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'title' => 'ترحيب بالموظف الجديد',
                'content' => 'مرحباً بك في فريق العمل، يسعدنا انضمامك إلينا ونتمنى لك تجربة مهنية موفقة معنا.',
            ],
            [
                'title' => 'تنبيه إداري',
                'content' => 'نود تنبيهك إلى ضرورة الالتزام بالتعليمات الإدارية المعتمدة داخل المؤسسة.',
            ],
            [
                'title' => 'طلب حضور اجتماع',
                'content' => 'يرجى الحضور إلى الاجتماع المحدد في الوقت المحدد، حيث سيتم مناقشة مواضيع مهمة.',
            ],
            [
                'title' => 'شكر وتقدير',
                'content' => 'نشكر لك جهودك المبذولة خلال الفترة الماضية، ونتمنى لك دوام التوفيق والنجاح.',
            ],
            [
                'title' => 'تنبيه عاجل',
                'content' => 'يرجى التعامل مع هذا الموضوع بشكل عاجل ومتابعته في أقرب وقت ممكن.',
            ],
        ];

        foreach ($templates as $template) {
            MessageTemplate::create($template);
        }
    }
}
