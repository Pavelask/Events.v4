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
        Schema::table('greetings', function (Blueprint $table) {
            $table->string('greetings_subtitle')->nullable()->after('greetings_title');
            $table->string('greetings_image_description')->nullable()->after('greetings_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('greetings', function (Blueprint $table) {
            $table->dropColumn('greetings_subtitle');
            $table->dropColumn('greetings_image_description');
        });
    }
};
