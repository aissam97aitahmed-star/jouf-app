<?php

namespace App\Console\Commands;

use App\Imports\UsersImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportUsersFromExcel extends Command
{
    protected $signature = 'users:import {file=users.xlsx}';
    protected $description = 'Import users from Excel file stored in public folder';

    public function handle()
    {
        $filePath = public_path($this->argument('file'));

        if (!file_exists($filePath)) {
            $this->error('❌ File not found: ' . $filePath);
            return Command::FAILURE;
        }

        Excel::import(new UsersImport, $filePath);

        $this->info('✅ Users imported successfully');
        return Command::SUCCESS;
    }
}
