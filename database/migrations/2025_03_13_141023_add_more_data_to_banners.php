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
        Schema::table('banners', function (Blueprint $table) {
            $table->string('banner_title')->nullable()->after('banner_name');
            $table->string('banner_description')->nullable()->after('banner_title');
            $table->string('banner_link_name')->nullable()->after('banner_url');
            $table->string('banner_link_url')->nullable()->after('banner_link_name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('banner_title');
            $table->dropColumn('banner_description');
            $table->dropColumn('banner_link_name');
            $table->dropColumn('banner_link_url');
        });
    }
};
