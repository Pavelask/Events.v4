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
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('event_banner_logo')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->integer('event_type')->nullable();
            $table->string('event_status')->nullable();
            $table->text('event_agreement')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_passport')->default(false);
            $table->boolean('is_registration')->default(false);
            $table->string('event_sort')->default(500);
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
