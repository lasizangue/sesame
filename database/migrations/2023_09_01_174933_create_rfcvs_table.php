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
        Schema::create('rfcvs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dossier_id')->constrained();
            $table->date('dateRfcvSou')->nullable();
            $table->string('numRfcvSoumi')->nullable();
            $table->date('dateRfcvVal')->nullable();
            $table->string('numRfcvValide')->nullable();
            $table->string('rfcvAnnule')->nullable();
            $table->string('rfcvAnnuleMotif')->nullable();
            $table->string('observRfcv')->nullable();
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
        Schema::table('rfcvs', function (Blueprint $table) {
            $table->dropForeign('dossier_id');
        });

        Schema::dropIfExists('rfcvs');
    }
};
