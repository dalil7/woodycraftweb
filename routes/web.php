<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuzzleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdresseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Page d’accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// 🧩 Puzzles & catégories accessibles sans connexion
Route::resource('puzzles', PuzzleController::class)->only(['index', 'show']);
Route::get('/puzzles/categorie/{id}', [PuzzleController::class, 'parCategorie'])
    ->name('puzzles.parCategorie');

// 🛒 Panier (accessible même sans être connecté)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// 🚚 Adresse & 💳 Paiement (réservés aux utilisateurs connectés)
Route::middleware('auth')->group(function () {
    Route::get('/checkout/adresse', [AdresseController::class, 'form'])->name('checkout.adresse');
    Route::post('/checkout/adresse', [AdresseController::class, 'store'])->name('checkout.adresse.store');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.show');
    Route::post('/commande/valider', [CheckoutController::class, 'validerCommande'])->name('commande.valider');
});

// 👤 Tableau de bord & profil (authentification requise)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🧠 Redirection automatique vers login si non connecté (sécurité)
Route::fallback(function () {
    return redirect()->route('home');
});

// 🔑 Auth routes (Breeze / Jetstream)
require __DIR__.'/auth.php';
    Route::get('/checkout/telecharger/{path}', [CheckoutController::class, 'telecharger'])
    ->middleware('auth')
    ->where('path', '.*')
    ->name('checkout.telecharger');
