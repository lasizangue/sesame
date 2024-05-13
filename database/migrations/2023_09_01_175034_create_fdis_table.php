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
        Schema::create('fdis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dossier_id')->constrained();
            $table->date('dateFdiSou')->nullable();
            $table->string('numFdiSoumi')->nullable();
            $table->date('dateFdiVal')->nullable();
            $table->string('numFdiValide')->nullable();
            $table->string('fdiAnnule')->nullable();
            $table->string('fdiAnnuleMotif')->nullable();
            $table->string('observFdi')->nullable();
            $table->string('statut')->nullable();
            $table->string("imageUrl")->nullable();
            $table->timestamps();
        });
    }
            

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fdis', function (Blueprint $table) {
            $table->dropForeign('dossier_id');
        });
        Schema::dropIfExists('fdis');
    }
};
