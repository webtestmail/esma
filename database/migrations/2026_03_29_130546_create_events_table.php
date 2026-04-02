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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('banner_image')->nullable();
            $table->string('event_video_path')->nullable();
            
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();

            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();

            $table->string('venue_name')->nullable();
            $table->text('venue_address')->nullable();
            $table->string('country')->nullable();
            $table->text('venue_location_link')->nullable(); // Google Maps URL
            $table->string('venue_image')->nullable();

            $table->enum('charge_type', ['free', 'paid'])->default('free');
            $table->decimal('price', 10, 2)->default(0.00);
            // Useful Links Toggles
            $table->boolean('has_useful_links')->default(false);
            $table->text('where_to_stay')->nullable();
            $table->text('where_to_eat')->nullable();
            $table->text('flight_info')->nullable();
            $table->text('discover_river')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
