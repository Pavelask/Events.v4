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
        Schema::create('event_adresses', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('events_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->text('contact_info')->nullable();
            $table->text('city')->nullable();
            $table->text('adress')->nullable();
            $table->string('image_map')->nullable();;
            $table->string('map_code')->nullable();
            $table->boolean('is_visible')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_adresses');
    }
};
