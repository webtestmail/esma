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
        Schema::table('users',function(Blueprint $table){
            $table->string('ig_access_token', 512)->nullable()->after('password');
            $table->string('ig_page_id')->nullable()->after('ig_access_token');
            $table->string('ig_business_id')->nullable()->after('ig_page_id');
            $table->timestamp('ig_token_expires_at')->nullable()->after('ig_business_id');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ig_access_token');
            $table->dropColumn('ig_page_id');
            $table->dropColumn('ig_business_id');
            $table->dropColumn('ig_token_expires_at');
        });
    }
};
