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
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_ids')->nullable();
            $table->text('name')->nullable();
            $table->text('slug')->nullable();
            $table->string('banner')->nullable();
            $table->text('title')->nullable();
            $table->longText('subtitle')->nullable();
            $table->text('video')->nullable();
            $table->text('image')->nullable();
            $table->longText('short_description')->nullable();
            $table->text('image1')->nullable();
            $table->longText('description')->nullable();
            $table->longText('more_images')->nullable();
            $table->longText('full_description')->nullable();
            $table->text('website_url')->nullable();
            $table->string('status')->default('active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
