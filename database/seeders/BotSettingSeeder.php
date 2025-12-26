<?php

namespace Database\Seeders;

use App\Models\BotSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BotSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BotSetting::updateOrCreate(
            ['id' => 1],
            [
                'bot_name'           => 'المساعد الذكي',
                'welcome_message'    => 'مرحباً! أنا هنا لمساعدتك في أي استفسارات حول الشركة أو إجراءات العمل. كيف يمكنني مساعدتك؟',
                'language'           => 'ar',
                'is_active'          => true,
                'response_delay'     => 0,
                'smart_reply'        => true,
                'save_conversations' => true,
            ]
        );
        $this->command->info('Bot Setting Data Created!');

    }
}
