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
        Schema::table('projects', function (Blueprint $table) {
            // aggiungo la colonna
            $table->unsignedBigInteger('type_id')->nullable()->default(null);

            // definisco il vincolo di relazione tra le due tabelle
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // rimuovo il vincolo
            $table->dropForeign('projects_type_id_foreign');

            // rimuovo la colonna da eliminare
            $table->dropColumn('type_id');
        });
    }
};
