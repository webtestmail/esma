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
        Schema::create('deliverables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campagin_id')->constrained()->onDelete('cascade');
            $table->bigInteger('reels')->default(0);
            $table->bigInteger('posts')->default(0);
            $table->bigInteger('stories')->default(0);
            $table->bigInteger('number_of_influencers_required')->default(0);
            $table->double('cost_per_influencer')->default(0);
            $table->double('minimum_engagement_rate')->default(0);
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliverables');
    }
};
