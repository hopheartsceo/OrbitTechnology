<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visual_styles', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 2)->index();
            $table->string('section_title');
            $table->text('description');
            $table->json('style_elements')->nullable(); // Whitespace, Grid, Photography, Icons, etc.
            $table->string('mockup_image_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visual_styles');
    }
};
