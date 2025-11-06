<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('strategy_applications', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 2)->index();
            $table->string('section_title');
            $table->text('description');
            $table->string('application_type'); // Business Proposal, Brand Deck, Infographic, etc.
            $table->string('preview_image_url')->nullable();
            $table->text('details')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('strategy_applications');
    }
};
