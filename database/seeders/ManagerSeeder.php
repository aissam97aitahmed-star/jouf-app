<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manager::create([
            'employee_id' => 'MGR001',
            'name' => 'Security Manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('Aljouf19876'), // change to secure password
        ]);
    }
}
