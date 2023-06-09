<?php

use App\Http\Controllers\BanniereEventController;
use App\Http\Controllers\CadeauController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\EspeceFleurController;
use App\Http\Controllers\FleurController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\NotreLivraisonController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TableauProduitController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/previous_page', function () {
        return redirect()->back();
    })->name('previous_page');
   
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Route::get('/espece_fleur', [EspeceFleur::class], 'index')->name('espece_fleur.index');
    // Route::resource('espece_fleur', EspeceFleurController::class);
    
    
    Route::group(['middleware' => ['role:super-user']], function () {
        Route::resource('role', RoleController::class);
        Route::resource('user', UserController::class);
        
    });

    Route::group(['middleware' => ['role:admin|super-user']], function () {
        Route::resource('espece_fleur', EspeceFleurController::class);
        Route::resource('couleur', CouleurController::class);
        Route::resource('unite', UniteController::class);
        Route::resource('categorie', CategorieController::class);
        Route::resource('notre_livraison', NotreLivraisonController::class);
        Route::resource('photo', PhotoController::class);
        Route::resource('livraison', LivraisonController::class);
        Route::resource('fleur', FleurController::class);
        Route::resource('produit', ProduitController::class);
        Route::resource('commande', CommandeController::class);
        Route::resource('cadeau', CadeauController::class);
        Route::resource('banniere_event', BanniereEventController::class);
        
        // commande
        Route::get('commandeById', [CommandeController::class, 'getById'])->name('commande.getById');
        Route::get('commandeByDate', [CommandeController::class, 'getByDate'])->name('commande.getByDate');
        Route::get('commandeNonLivres', [CommandeController::class, 'nonLivres'])->name('commande.nonLivres');
        Route::get('commandeLivre', [CommandeController::class, 'livre'])->name('commande.livre');
        // Route::get('commandeToday', [CommandeController::class, 'today'])->name('commande.today');
        // Route::get('commandeTomorrow', [CommandeController::class, 'tomorrow'])->name('commande.tomorrow');
        Route::get('commandeByDateCreate', [CommandeController::class, 'getByDateCreate'])->name('commande.getByDateCreate');
        Route::get('commandeByDateCreateList', [CommandeController::class, 'getByDateCreateList'])->name('commande.getByDateCreateList');

        // produit
        Route::get('produitById', [ProduitController::class, 'getById'])->name('produit.getById');
        Route::get('produitByNom', [ProduitController::class, 'getByNom'])->name('produit.getByNom');
        Route::get('produit/categorie/{id}', [ProduitController::class, 'getByCategorie'])->name('produit.categorie');
        Route::get('produit/couleur/{id}', [ProduitController::class, 'getByCouleur'])->name('produit.couleur');
        Route::get('produit/espece_fleur/{id}', [ProduitController::class, 'getByNomFleur'])->name('produit.espece_fleur');

        // tableau produit
        Route::get('tableau_produit', [TableauProduitController::class, 'index'])->name('tableau_produit');
        Route::get('tableau_produit/vendu', [TableauProduitController::class, 'getByDateListProduitVendu'])->name('tableau_produit.vendu');
        
    });

    Route::group(['middleware' => ['role:admin|super-user|livreur']], function () { 
        
     
        Route::get('commandeToday', [CommandeController::class, 'today'])->name('commande.today');
        Route::get('commandeTomorrow', [CommandeController::class, 'tomorrow'])->name('commande.tomorrow');
        Route::get('livreur/today', [LivreurController::class, 'today'])->name('livreur.today');
        Route::get('setDateLivre/{id}', [LivraisonController::class, 'setDateLivre'])->name('setDateLivre');
    });

   
    
});



require __DIR__.'/auth.php';