<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
Route::get('/patient/list', 'App\Http\Controllers\PatientController@index')->name('patients.index');
Route::get('/visit/list', 'App\Http\Controllers\VisitController@index')->name('visit.index');
Route::get('/treatment/list', 'App\Http\Controllers\TreatmentController@index')->name('treatment.index');

Route::get('/patient/search', 'App\Http\Controllers\PatientController@search');
Route::get('/visit/search', 'App\Http\Controllers\VisitController@search');
Route::get('/treatment/search', 'App\Http\Controllers\TreatmentController@search');

Route::get('/edit-visit/{visit}', 'App\Http\Controllers\VisitController@edit');

Route::post('/patient', 'App\Http\Controllers\PatientController@store');
Route::post('/visit', 'App\Http\Controllers\VisitController@store');
Route::post('/treatment', 'App\Http\Controllers\TreatmentController@store');
Route::get ('/index', function(){return view('index');})->name('index');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
