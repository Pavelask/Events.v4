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
        Schema::create('event_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('events_id')->nullable()
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->string('doc_name')->nullable();
            $table->string('doc_file')->nullable();
            $table->string('doc_sort')->default(500);
            $table->boolean('is_visible')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_documents');
    }
};
