<?php

//use App\Models\Dossier;

use App\Http\Controllers\PdfGeneratorController;
use App\Http\Livewire\Bordereau;
use App\Http\Livewire\ClientComp;
use App\Http\Livewire\CompAcconier;
use App\Http\Livewire\CompAerien;
use App\Http\Livewire\CompagnieComp;
use App\Http\Livewire\CompAnnulValidation;
use App\Http\Livewire\CompMaintenance;
use App\Http\Livewire\CompMdp;
use App\Http\Livewire\CompOperationnel;
use App\Http\Livewire\CompOrdre;
use App\Http\Livewire\CompRfcv;
use App\Http\Livewire\CompValidation;
use App\Http\Livewire\ConteneurComp;
use App\Http\Livewire\CotaAnnule;
use App\Http\Livewire\CotationComp;
use App\Http\Livewire\DetachementComp;
use App\Http\Livewire\DossierComp;
use App\Http\Livewire\NotificationComp;
use App\Http\Livewire\ServiceComp;
use App\Http\Livewire\TransporteurComp;
use App\Http\Livewire\Utilisateur;
use App\Http\Livewire\VueGlobal;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Le groupe des routes relatives à l'espace client uniquement
Route::get("/tableau/vues", VueGlobal::class)
    ->name('clien.tableau.vues.index')
    ->middleware('auth.clien');

//route mot de passe
Route::get("/motdepasse/mdps", CompMdp::class)
    ->name('clien.mdps.index')
    ->middleware('auth.clien');

// Le groupe des routes relatives au détachement informatique uniquement
//HABILITATIONS
Route::get("/habilitations/detachements", DetachementComp::class)
    ->name('info.habilitations.detachements.index')
    ->middleware('auth.info');
Route::get("/habilitations/servics", ServiceComp::class)
    ->name('info.habilitations.servics.index')
    ->middleware('auth.info');
Route::get('/habilitations/utilisateurs', Utilisateur::class)
    ->name('info.habilitations.utilisateurs.index')
    ->middleware('auth.info');
Route::get('/maintenance/outils', CompMaintenance::class)
    ->name('info.maintenance.outils.index')
    ->middleware('auth.info');
//OUVERTURE
Route::get('/Ouverture/gestdos', DossierComp::class)
    ->name('ouv.ouverture.dossiers.index')
    ->middleware('auth.ouv');
Route::get('/Ouverture/tableclients', ClientComp::class)
    ->name('ouv.ouverture.cliens.index')
    ->middleware('auth.ouv');
//EMA
//COTAION
Route::get('/cotation/modification', CotationComp::class)
    ->name('ema.cotation.cotations.index')
    ->middleware('auth.ema');
//COTAION -ANNULATION
Route::get('/cotation/annulation',CotaAnnule::class)
    ->name('ema.cotation.cotannuls.index')
    ->middleware('auth.ema');
//LIVRAISON-COMPAGNIES
Route::get('/livraison/compagnie',CompagnieComp::class)
    ->name('liv.livraison.compagnies.index')
    ->middleware('auth.liv');

//LIVRAISON-CONTENEUR
Route::get('/livraison/conteneur',ConteneurComp::class)
    ->name('liv.livraison.conteneurs.index')
    ->middleware('auth.liv');
//LIVRAISON-TRANSPORTEUR
Route::get('/livraison/transporteur',TransporteurComp::class)
    ->name('liv.livraison.transporteurs.index')
    ->middleware('auth.liv');
//LIVRAISON-MODIFICATION
Route::get('/livraison/bordereau',Bordereau::class)
    ->name('liv.livraison.bordereaux.index')
    ->middleware('auth.liv');
//Ordre de livraison
Route::get('/livraison/ordreLivraison',CompOrdre::class)
    ->name('liv.livraison.ordres.index')
    ->middleware('auth.liv');
//Service aerien
Route::get('/aerien/saisie',CompAerien::class)
    ->name('aer.aerien.saisies.index')
    ->middleware('auth.aer');

//Service aerien
Route::get('/acconier/gestion',CompAcconier::class)
    ->name('acconier.index')
    ->middleware('auth');

//OPERATIONNEL -PASSAGE EN DOUANE
Route::get('/operationnel/passage',CompOperationnel::class)
    ->name('opera.operationnel.passages.index')
    ->middleware('auth.opera');
//DOCUMENTATION
Route::get('/documentation/rfcvfdi',CompRfcv::class)
    ->name('doc.documentation.rfcvs.index')
    ->middleware('auth.doc');
//Validation
Route::get('/validation/validmodif',CompValidation::class)
    ->name('ema.validation.valids.index')
    ->middleware('auth.ema');
//Validation annulation
Route::get('/validation/validannul',CompAnnulValidation::class)
    ->name('ema.validation.anvalids.annul')
    ->middleware('auth.ema');

//new messages
Route::get('/newmessages',NotificationComp::class)
    ->name('new')
    ->middleware('auth');

//new messages
Route::get('/allnotifications',NotificationComp::class)
    ->name('all')
    ->middleware('auth');
