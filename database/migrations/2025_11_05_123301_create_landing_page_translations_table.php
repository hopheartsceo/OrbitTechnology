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
        Schema::create('landing_page_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5)->default('en'); // ar, en
            $table->string('site_title');
            $table->text('site_description')->nullable();
            $table->string('nav_home')->default('Home');
            $table->string('nav_services')->default('Services');
            $table->string('nav_pricing')->default('Pricing');
            $table->string('nav_contact')->default('Contact');
            $table->string('nav_login')->default('Login');
            $table->string('footer_copyright');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique('locale');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_page_translations');
    }
};
