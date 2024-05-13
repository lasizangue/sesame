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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->date('dateOrdreLivraison')->nullable();
            $table->string('numDossier')->unique();
            $table->string('typeDossier');
            $table->string('modeTransport');
            $table->string('regimeDouanier');
            $table->string('fournisseur')->nullable();
            $table->integer('nbreTc20');
            $table->integer('nbreTc40');
            $table->string('nbreColis');
            $table->string('marchandise');
            $table->string('connaissement');
            $table->boolean('danger')->nullable();
            $table->integer('poidsBrut');
            $table->date('dateOuverture')->nullable();
            $table->boolean('statuCoter')->nullable();
            $table->boolean('statuValider')->nullable();
            $table->boolean('statuMisEnLivraison')->nullable();
            $table->boolean('statuBae')->nullable();
            $table->date('dateBae')->nullable();
            $table->string('nBae')->nullable();
            $table->string('bureauDouane')->nullable();
            $table->string('phyto')->nullable();
            $table->boolean('statuLivrer')->nullable();
            $table->date('dateCotation')->nullable();
            $table->string('numDeclaration')->nullable();
            $table->string('numLiquidation')->nullable();
            $table->string('circuit')->nullable();
            $table->double('montanDeclaration')->nullable();
            $table->date('dateValidation')->nullable();
            $table->string('typeChargement')->nullable();
            $table->string('conteneurisation')->nullable();
            $table->date('dateMiseEnLivraison')->nullable();
            $table->date('dateLivraison')->nullable();
            $table->date('dateReception')->nullable();
            $table->boolean('dosMultiDeclaration')->nullable();
            $table->string('bl')->nullable();
            $table->string('observLivraison')->nullable();
            $table->string('navire')->nullable();
            $table->string('port')->nullable();
            $table->date('dateNavire')->nullable();
            $table->date('datePassage')->nullable();
            $table->string('lieu')->nullable();
            $table->string('modeLivraison')->nullable();
            $table->string('modeChargemenAerien')->nullable();
            $table->string('lta')->nullable();
            $table->string('vol')->nullable();
            $table->string('aeroportDepart')->nullable();
            $table->date('dateArrivee')->nullable();
            $table->date('dateBl')->nullable();
            $table->string('emailouv')->nullable();
            $table->string('emailcota')->nullable();
            $table->string('emailrfcv')->nullable();
            $table->string('emailfdi')->nullable();
            $table->string('emailvalid')->nullable();
            $table->string('emailpass')->nullable();
            $table->string('emailaerien')->nullable();
            $table->string('emailpreliv')->nullable();
            $table->string('emailmiliv')->nullable();
            $table->string('emailliv')->nullable();
            $table->string('okrfcv')->nullable();
            $table->string('okfdi')->nullable();
            $table->string('libClient')->nullable();
            $table->string("imageUrl")->nullable();
            $table->string('agentCotation')->nullable();
            $table->string('dateVisite')->nullable();
            $table->string('verificateur')->nullable();
            $table->string('verifObserv')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('transporteur_id')->nullable();
            $table->foreignId('client_id');
            $table->foreignId('buro_id')->nullable();
            $table->foreignId('compagnie_id');
            $table->foreignId('acconier_id')->nullable();
            $table->string('nomAcconier')->nullable();
            $table->string('terminal')->nullable();
            $table->string('nomCompagnie')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->dropForeign('user_id', 'client_id', 'compagnie_id','transporteur_id','buro_id','acconier_id');
        });

        Schema::dropIfExists('dossiers');
    }
};
