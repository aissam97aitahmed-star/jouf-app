<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\ManagerSeeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            ManagerSeeder::class,
        ]);
        // User::create([
        //     'name' => 'عمرو زيد',
        //     'username' => 'Amr',
        //     'email' => 'amr@gmail.com',
        //     'password' => Hash::make('Aljouf106000'), // ضع كلمة المرور التي تريدها
        // ]);
    }
}
