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
        Schema::table('members', function (Blueprint $table) {
            $table->integer('option_one')->nullable()->after('qr_code_pic');
            $table->integer('option_two')->nullable()->after('option_one'); // two three four five
            $table->integer('option_three')->nullable()->after('option_two');
            $table->integer('option_four')->nullable()->after('option_three');
            $table->integer('option_five')->nullable()->after('option_four');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('option_one');
            $table->dropColumn('option_two');
            $table->dropColumn('option_three');
            $table->dropColumn('option_four');
            $table->dropColumn('option_five');
        });
    }
};
