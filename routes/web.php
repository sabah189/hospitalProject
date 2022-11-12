<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomPatientController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* ------ patients ---- */
Route::get('/patients', [App\Http\Controllers\CustomPatientController::class, 'index'])->name('patients');
Route::get('/patients/create', [App\Http\Controllers\CustomPatientController::class, 'create'])->name('patients.create');
Route::post('/patients/edit', [App\Http\Controllers\CustomPatientController::class, 'edit'])->name('patients.edit');
Route::post('/patients/save', [App\Http\Controllers\CustomPatientController::class, 'store'])->name('patients.store');

/* ------ departements---- */
Route::get('/departement', [App\Http\Controllers\DepartmentController::class, 'index'])->name('departement');
Route::get('/departements/create', [App\Http\Controllers\DepartmentController::class, 'createDepart'])->name('departements.create');

/* ------ Medicines---- */
Route::get('/medicines', [App\Http\Controllers\MedicineController::class, 'medicament'])->name('medicament');
 
/* Route::resource('patients', CustomPatientController::class); */




