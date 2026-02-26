<?php

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
        Schema::create('bot_options', function (Blueprint $table) {
            $table->id();
            $table->integer('option_number')->unique(); // 1..9
            $table->string('title');          // اسم الخيار
            $table->text('content');          // رد البوت
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bot_options');
    }
};
