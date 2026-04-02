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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name', 500)->nullable();
            $table->bigInteger('follower_count')->default(0);
            $table->string('instagram_url', 1000)->nullable();
            $table->string('youtube_url', 1000)->nullable();
            $table->string('tiktok_url', 1000)->nullable();
            $table->string('website_url', 1000)->nullable();
            $table->string('image', 1000)->nullable();
            $table->string('niche', 255)->nullable();
            $table->string('location', 1000)->nullable();
            $table->string('industry', 1000)->nullable();
            $table->string('budget', 1000)->nullable();
            $table->text('about')->nullable(); 
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
