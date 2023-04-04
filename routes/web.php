<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\EspeceFleurController;
use App\Http\Controllers\FleurController;
use App\Http\Controllers\NotreLivraisonController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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
       
        Route::resource('fleur', FleurController::class);
        Route::resource('produit', ProduitController::class);
    });
    
});



require __DIR__.'/auth.php';