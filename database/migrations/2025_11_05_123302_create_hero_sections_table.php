<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5);
            $table->string('title');
            $table->text('subtitle');
            $table->string('primary_button_text')->default('Start Now');
            $table->string('primary_button_url')->nullable();
            $table->string('secondary_button_text')->default('View Pricing');
            $table->string('secondary_button_url')->default('#pricing');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['locale', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
