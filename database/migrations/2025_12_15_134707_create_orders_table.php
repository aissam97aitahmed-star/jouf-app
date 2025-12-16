<?php

use App\Enums\Department;
use App\Enums\VisitPurpose;
use App\Enums\VisitDuration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // Step 1 – Personal Info
            $table->string('order_number')->unique();
            $table->string('full_name');
            $table->string('identity_number');
            $table->string('nationality')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('job_title')->nullable();

            // Step 2 – Visit Details
            $table->enum('visit_purpose', VisitPurpose::values());
            $table->date('visit_date');
            $table->time('visit_time');
            $table->enum('visit_duration', VisitDuration::values())->nullable();
            $table->string('host_employee');
            $table->enum('department', Department::values())->nullable();

            // Step 3 – Additional Info
            $table->string('car_plate')->nullable();
            $table->string('companions')->nullable();
            $table->text('special_requests')->nullable();


            // Step 4 – Additional Info
            $table->boolean('has_valid_id')->default(true); // أحمل هوية سارية المفعول
            $table->boolean('has_company_letter')->default(false); // أحمل خطاب من الشركة (اختياري)

            // Status
            $table->enum('status', ['pending', 'approved', 'rejected'])
                ->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
