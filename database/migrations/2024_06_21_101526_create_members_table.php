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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->string('events_id')->nullable();
            $table->foreign('events_id')
                ->references('id')
                ->on('events');
            $table->string('eventsName')->nullable();
            $table->string('surName')->nullable();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->date('birthDate');
            $table->string('snils')->nullable();
            $table->string('education')->nullable();
            $table->string('contactPhone')->nullable();
            $table->string('email')->nullable();
            $table->string('workPhone')->nullable();
            $table->string('job_title')->nullable();
            $table->string('name_ppo')->nullable();
            $table->string('name_to')->nullable();
            $table->string('region')->nullable();
            $table->text('note')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('qr_code_pic')->nullable();
            $table->integer('agreement')->nullable();
            $table->integer('confirmation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
