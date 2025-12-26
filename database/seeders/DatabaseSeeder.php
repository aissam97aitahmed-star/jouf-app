<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\BotFaqSeeder;
use Database\Seeders\ManagerSeeder;
use Database\Seeders\FacilitySeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\BotSettingSeeder;
use Database\Seeders\PolicyCategorySeeder;
use Database\Seeders\MessageTemplateSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
            AdminSeeder::class,
            BotFaqSeeder::class,
            BotSettingSeeder::class,
            FacilitySeeder::class,
            MessageTemplateSeeder::class,
            PolicyCategorySeeder::class,
        ]);

    }
}





