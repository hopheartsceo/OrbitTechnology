<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('typographies', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 2)->index();
            $table->string('section_title');
            $table->text('description')->nullable();
            $table->string('font_category'); // Primary, Secondary, Arabic
            $table->string('font_name');
            $table->json('font_weights')->nullable(); // Light, Bold, Book, Black, etc.
            $table->string('usage_context')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('typographies');
    }
};
