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
        Schema::table('event_documents', function (Blueprint $table) {
            $table->string('docx_file')->nullable()->after('doc_file');
//            $table->renameColumn('doc_file', 'pdf_file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_documents', function (Blueprint $table) {
            $table->dropColumn('docx_file');
        });
    }
};
