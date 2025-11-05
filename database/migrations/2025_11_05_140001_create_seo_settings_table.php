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
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5)->default('en'); // ar, en
            $table->string('page')->default('landing'); // landing, about, contact, etc.

            // Basic SEO
            $table->string('meta_title', 120)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();

            // Open Graph (Facebook, LinkedIn)
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->default('website');

            // Twitter Card
            $table->string('twitter_card')->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_site')->nullable(); // @username

            // Structured Data (JSON-LD)
            $table->json('structured_data')->nullable();

            // Additional Settings
            $table->string('robots')->default('index, follow');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['locale', 'page', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};
