<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuzzleController;
use App\Http\Controllers\CategorieController;
use App\Models\Categorie;
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

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route :: resource ('puzzles' , PuzzleController :: class ) -> middleware ('auth') ;
require __DIR__.'/auth.php';


Route::get('/puzzles/categorie/{id}', [PuzzleController::class, 'parCategorie'])
    ->middleware(['auth'])
    ->name('puzzles.parCategorie');


Route::get('/puzzles/categorie/{id}', [PuzzleController::class, 'parCategorie'])
    ->middleware(['auth'])
    ->name('puzzles.parCategorie');
