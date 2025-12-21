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
        Schema::create('bot_settings', function (Blueprint $table) {
            $table->id();
            $table->string('bot_name')->default('المساعد الذكي');
            $table->text('welcome_message');
            $table->string('language')->default('ar');
            $table->boolean('is_active')->default(true);
            $table->decimal('response_delay', 3, 1)->default(0);
            $table->boolean('smart_reply')->default(true);
            $table->boolean('save_conversations')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bot_settings');
    }
};
