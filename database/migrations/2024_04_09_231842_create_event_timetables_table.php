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
        Schema::create('event_timetables', function (Blueprint $table) {
            $table->id();
            $table->foreignid('event_schedules_id')
                ->references('id')->on('event_schedules')
                ->onDelete('cascade');
            $table->string('time')->nullable();
            $table->string('place')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('sort')->default(500);
            $table->boolean('is_visible')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_timetables');
    }
};
