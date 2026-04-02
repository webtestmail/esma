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
        Schema::table('instagrams', function (Blueprint $table) {
        $table->unsignedInteger('followers_count')->default(0)->after('instagram_user_id');
    $table->unsignedInteger('media_count')->default(0)->after('followers_count');
    $table->float('engagement_rate', 5, 2)->default(0.00)->after('media_count');
    // Optional: Add a timestamp for when metrics were last updated
    $table->timestamp('metrics_last_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
