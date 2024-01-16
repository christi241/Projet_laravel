<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\CandidatController;
//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/',[CandidatCantroller::class,'index']);




Route::get('/dashboard', function () {

    return redirect()->route('dashboard.index');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


//route pour l'admin
Route::resource('candidat',CandidatCantroller::class);
Route::middleware('auth')->group(function () {
    Route::resource('programmes', ProgrammeController::class);
    Route::post('/votez', [VoteController::class, 'votez1'])->name('votez.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//route pour les programmes



