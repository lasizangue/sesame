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
        Schema::create('conteneurs', function (Blueprint $table) {
            $table->id();
            $table->string('numTc');
            $table->string('typeTc');
            $table->string('libClient')->nullable();
            $table->string('client_id')->nullable();
            $table->date('dateValidation')->nullable();
            $table->foreignId('dossier_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('conteneurs', function (Blueprint $table) {
            $table->dropForeign('dossier_id');
        });

        Schema::dropIfExists('conteneurs');
    }
};
