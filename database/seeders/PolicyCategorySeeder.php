<?php

namespace Database\Seeders;

use App\Models\PolicyCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PolicyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'الموارد البشرية',
            'الأمان والسلامة',
            'تقنية المعلومات',
            'المالية والمحاسبة',
            'السلوك المهني',
        ];

        foreach ($categories as $category) {
            PolicyCategory::firstOrCreate([
                'name' => $category,
            ]);
        }
    }
}
