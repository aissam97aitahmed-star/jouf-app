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

        // $this->call([
        //     ManagerSeeder::class,
        // ]);
        User::create([
            'role' => 'employee',
            'name' => 'عمرو زيد',
            'username' => 'Amr',
            'email' => 'amr@gmail.com',
            'password' => Hash::make('Aljouf106000'), // ضع كلمة المرور التي تريدها
        ]);
        User::create([
            'role' => 'security_manager',
            'name' => 'احمد زيد',
            'username' => 'Aljouf009',
            'email' => 'sec@gmail.com',
            'password' => Hash::make('Aljouf1897900'), // ضع كلمة المرور التي تريدها
        ]);
        User::create([
            'role' => 'security_officer',
            'name' => 'احمد زيد',
            'username' => 'Aljouf067655',
            'email' => 'red@gmail.com',
            'password' => Hash::make('Aljouf5465757'), // ضع كلمة المرور التي تريدها
        ]);

        User::create([
            'role' => 'admin',
            'name' => 'علي زيد',
            'username' => 'AljoufAdmin043',
            'email' => 'ali@gmail.com',
            'password' => Hash::make('AljoufAdmin32443'), // ضع كلمة المرور التي تريدها
        ]);
    }
}
