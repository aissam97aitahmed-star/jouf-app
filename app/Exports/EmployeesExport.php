<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Employee::select('id', 'name', 'position', 'department', 'email', 'phone', 'office_location')->get();
    }

    public function headings(): array
    {
        return ['ID', 'الاسم', 'الوظيفة', 'الإدارة', 'البريد الإلكتروني', 'الهاتف', 'المكتب'];
    }
}
