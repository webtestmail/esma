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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained()->onDelete('cascade');
            
            $table->string('razorpay_subscription_id')->unique()->nullable();
            
            // Status tracking (e.g., 'active', 'authenticated', 'cancelled', 'expired')
            $table->string('status')->default('created'); 
            
            // Billing tracking
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable(); // Essential for checking access
            $table->dateTime('trial_ends_at')->nullable();
            $table->dateTime('canceled_at')->nullable();
            
            // Payment meta
            $table->string('payment_method')->nullable(); // card, upi, etc.
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
