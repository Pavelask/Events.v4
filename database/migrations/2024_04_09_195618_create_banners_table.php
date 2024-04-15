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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('events_id')->nullable()
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->string('banner_name')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('banner_url')->nullable();
            $table->string('banner_sort')->default(500);
            $table->boolean('is_visible')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
