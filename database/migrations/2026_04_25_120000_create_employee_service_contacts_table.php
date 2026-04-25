<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_service_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('service_key');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_service_contacts');
    }
};
