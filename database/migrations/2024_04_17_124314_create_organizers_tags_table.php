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
        Schema::create('organizers_tags', function (Blueprint $table) {
            $table->foreignId('organizers_id')->constrained('organizers')->cascadeOnDelete();
            $table->foreignId('tags_id')->constrained('tags')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizers_tags');
    }
};
