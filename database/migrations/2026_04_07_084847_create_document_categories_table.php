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
       Schema::create('document_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // 2. The Main Documents Table
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('document_categories')->onDelete('cascade');
            
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');

            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path'); // Path to storage
            $table->string('file_type'); // pdf, docx, etc.
            $table->string('file_size')->nullable();
            
            $table->boolean('is_public')->default(false); // Visible on the public detail page
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_categories');
         Schema::dropIfExists('documents');
    }
};
