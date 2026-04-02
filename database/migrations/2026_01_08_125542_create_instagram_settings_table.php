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
        Schema::create('instagram_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instagram_id')->constrained()->onDelete('cascade');
            $table->boolean('auto_sync_posts')->default(true);
            $table->boolean('engagement_tracking')->default(true);
            $table->boolean('story_heighlights')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instagram_settings');
    }
};
