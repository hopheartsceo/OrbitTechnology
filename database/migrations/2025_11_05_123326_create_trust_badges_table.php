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
        Schema::create('trust_badges', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5);
            $table->string('icon')->default('fa-solid fa-shield-halved'); // FontAwesome class
            $table->text('text'); // Can contain line breaks
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['locale', 'is_active', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trust_badges');
    }
};
