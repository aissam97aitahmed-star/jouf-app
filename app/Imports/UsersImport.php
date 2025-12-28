<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
{
    // تجاهل الصفوف الفارغة
    if (empty($row['username']) || empty($row['name'])) {
        return null;
    }

    return new User([
        'username' => trim($row['username']),
        'name' => trim($row['name']),
        'email' => !empty($row['email']) ? trim($row['email']) : null,
        'password' => Hash::make(trim($row['password'])),
        'role' => 'employee',
    ]);
}

}
