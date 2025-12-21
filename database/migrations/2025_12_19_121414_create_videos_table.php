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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');                 // عنوان الفيديو
            $table->string('category')->nullable(); // الفئة (إداري، تقني...)
            $table->string('target_group')->nullable(); // الفئة المستهدفة
            $table->boolean('is_required')->default(false); // إجباري؟

            $table->text('description')->nullable(); // وصف الفيديو
            $table->text('what_you_will_learn')->nullable(); // ما ستتعلمه

            $table->integer('duration')->nullable(); // بالدقائق
            $table->unsignedBigInteger('views')->default(0); // عدد المشاهدات

            $table->string('video_path');            // مسار الفيديو
            $table->string('thumbnail')->nullable(); // صورة الخلفية

            $table->json('key_points')->nullable();  // النقاط الرئيسية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
