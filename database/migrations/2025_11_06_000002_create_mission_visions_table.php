<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mission_visions', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 2)->index();
            $table->string('section_title')->nullable();
            $table->string('vision_title');
            $table->text('vision_text');
            $table->string('mission_title');
            $table->text('mission_text');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mission_visions');
    }
};
