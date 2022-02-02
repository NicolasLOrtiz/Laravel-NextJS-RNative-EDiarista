<?php

use \App\Http\Controllers\ProfessionalController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProfessionalController::class, 'index'])->name('professionals.index');
Route::get('/professionals/create', [ProfessionalController::class, 'create'])->name('professionals.create');
Route::post('/professionals', [ProfessionalController::class, 'store'])->name('professionals.store');
Route::get('/professionals/{id}/edit', [ProfessionalController::class, 'edit'])->name('professionals.edit');
Route::put('/professionals/{id}', [ProfessionalController::class, 'update'])->name('professionals.update');
Route::get('/professionals/{id}', [ProfessionalController::class, 'destroy'])->name('professionals.destroy');
