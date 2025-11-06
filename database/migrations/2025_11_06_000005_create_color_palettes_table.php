<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('color_palettes', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 2)->index();
            $table->string('section_title');
            $table->text('description');
            $table->string('color_name');
            $table->string('hex_code', 7);
            $table->string('rgb_value')->nullable();
            $table->string('usage_context')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('color_palettes');
    }
};
