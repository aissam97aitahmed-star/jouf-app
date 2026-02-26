<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'الصيانة',
            'تقنية المعلومات',
            'الموارد البشرية',
            'المشتريات',
            'المستودعات',
            'المبيعات',
            'المجمع الصناعي - مصنع الزيت',
            'المجمع الصناعي - مصنع المخلل',
            'المجمع الصناعي - مصنع البطاطس',
            'الإدارة المالية',
            'إدارة الجودة',
            'إدارة الأمن والسلامة',
            'الشؤون الزراعية',
            'الشؤون القانونية',
            'مكتب الرئيس التنفيذي',
            'إدارة النقل',
            'المراجعة الداخلية',
        ];

        foreach ($departments as $dept) {
            Department::create([
                'name' => $dept,
                'responsible_employee' => null,
                'email' => null,
            ]);
        }
    }
}
