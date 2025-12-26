<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role' => 'admin',
            'name' => 'عمرو زيد',
            'username' => 'AljoufAdmin043',
            'email' => 'amro@gmail.com',
            'password' => Hash::make('AljoufAdmin32443'), // ضع كلمة المرور التي تريدها
        ]);
         $this->command->info('New Admin Created!');
    }
}
