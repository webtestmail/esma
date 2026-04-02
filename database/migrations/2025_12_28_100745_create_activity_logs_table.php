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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // The type of activity (e.g., 'campaign_created', 'influencer_approved')
            $table->string('type'); 
            
            // Bold title: "New Campaign Created"
            $table->string('title'); 
            
            // Description text: "Summer Fashion Collection..."
            $table->text('description'); 
            
            // Status badge text: "Active", "Approved", "Excellent"
            $table->string('status_label')->nullable(); 

            /**
             * JSON Metadata to store dynamic right-side values:
             * Example: {"budget": 15000} or {"followers": "2.5M"}
             */
            $table->json('metadata')->nullable();
            
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
