<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orbit_landings', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5)->default('en');
            $table->text('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->longText('about_text')->nullable();
            $table->string('about_image')->nullable();
            $table->json('services')->nullable();
            $table->json('showcase_images')->nullable();
            $table->json('clients')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_subtitle')->nullable();
            $table->string('cta_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orbit_landings');
    }
};
