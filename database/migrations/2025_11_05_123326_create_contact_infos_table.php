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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5);
            $table->string('type'); // 'phone', 'email', 'whatsapp'
            $table->string('icon')->default('fa-solid fa-phone'); // FontAwesome class
            $table->string('title');
            $table->string('value'); // actual phone/email/whatsapp number
            $table->string('link')->nullable(); // tel:, mailto:, https://wa.me/
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
        Schema::dropIfExists('contact_infos');
    }
};
