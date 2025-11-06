<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('logo_identities', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 2)->index();
            $table->string('section_title');
            $table->text('description');
            $table->string('primary_logo_url')->nullable();
            $table->string('symbol_logo_url')->nullable();
            $table->json('usage_rules')->nullable(); // Store do's and don'ts
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logo_identities');
    }
};
