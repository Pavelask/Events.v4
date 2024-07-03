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
        Schema::table('moderators', function (Blueprint $table) {
            $table->string('fullname')->nullable()->after('last_name');
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->string('fullname')->nullable()->after('last_name');
        });

        Schema::table('organizers', function (Blueprint $table) {
            $table->string('fullname')->nullable()->after('last_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('moderators', function (Blueprint $table) {
            $table->dropColumn('fulldate');
        });

        Schema::table('guests', function (Blueprint $table) {
            $table->dropColumn('fulldate');
        });

        Schema::table('organizers', function (Blueprint $table) {
            $table->dropColumn('fulldate');
        });
    }
};
