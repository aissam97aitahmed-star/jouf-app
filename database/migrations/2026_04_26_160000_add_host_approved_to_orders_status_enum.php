<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            ALTER TABLE orders
            MODIFY status ENUM(
                'pending',
                'host_approved',
                'approved',
                'rejected',
                'in_progress',
                'completed'
            ) DEFAULT 'pending'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE orders
            MODIFY status ENUM(
                'pending',
                'in_progress',
                'completed',
                'approved',
                'rejected'
            ) DEFAULT 'pending'
        ");
    }
};
