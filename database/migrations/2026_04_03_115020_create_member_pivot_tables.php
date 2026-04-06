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
        Schema::create('member_trade_sector', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('trade_sector_id')->constrained()->onDelete('cascade');
    });

    // Member <-> Product Category
    Schema::create('category_member', function (Blueprint $table) { // Alphabetical: Category & Member
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('product_category_id')->constrained()->onDelete('cascade');
    });

    // Member <-> Temperature
    Schema::create('member_temperature', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('temperature_id')->constrained()->onDelete('cascade');
    });

    // Member <-> Brand
    Schema::create('brand_member', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('brand_id')->constrained()->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_pivot_tables');
    }
};
