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
        Schema::create('target_audiences', function (Blueprint $table) {
            $table->id();
             $table->foreignId('campagin_id')->constrained()->onDelete('cascade');
             $table->string('influencer_category')->nullable();
             $table->text('campaign_description')->nullable();
             $table->string('target_gender')->nullable();
             $table->string('target_age_group')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('target_audiences');
    }
};
