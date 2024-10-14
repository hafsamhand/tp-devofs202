<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\StagiaireController;
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

Route::resource('stagiaires', StagiaireController::class);
Route::get('stagiaires/majorants', [StagiaireController::class, 'majorants'])->middleware(["auth"])->name("stagiaires.majorants");

//Route pour l'affichage des stagiaires par filtre de recherche
Route::post("/recherche", [App\Http\Controllers\StagiaireController::class, 'search'])->name("stagiaires.search");
Route::get('stagiaires/majorants', 'app/http/controllers/StagiaireController@majorants');

Route::resource('absences', AbsenceController::class);