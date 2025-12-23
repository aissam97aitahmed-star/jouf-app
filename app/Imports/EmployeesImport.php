<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
{
    // تجاهل الصفوف الفارغة
    if (empty($row['name']) || empty($row['position'])) {
        return null;
    }

    return new Employee([
        'name' => trim($row['name']),
        'position' => trim($row['position']),
        'department' => trim($row['department']),
        'email' => trim($row['email']),
        'phone' => trim($row['phone']),
        'office_location' => trim($row['office_location'] ?? null),
    ]);
}

}
