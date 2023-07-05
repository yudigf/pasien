<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegistrasiController;

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

Route::middleware(['guest'])->group(function (){
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/', [SessionController::class, 'login']);

});

Route::get('/home', function (){
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware('userAccess:admin');
    Route::get('/dashboard/admin', [AdminController::class, 'admin'])->middleware('userAccess:admin');
    Route::get('/dashboard/operator', [AdminController::class, 'operator'])->middleware('userAccess:operator');
    Route::get('/logout', [SessionController::class, 'logout']);
    Route::get('/registrasi/create', [RegistrasiController::class, 'showRegistrasiForm'])->middleware('userAccess:admin')->name('registrasi.create');
    Route::post('/registrasi', [RegistrasiController::class, 'submitRegistrasi'])->middleware('userAccess:admin')->name('registrasi.submit');
    Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('userAccess:admin')->name('registrasi.index');
});

// Route::get('/registrasi', [RegistrasiController::class, 'showRegistrasiForm'])->name('registrasi.form');

// Route::post('/registrasi/edit/{id}', [RegistrasiController::class, 'editRegistrasi'])->name('registrasi.edit');
Route::get('/registrasi/edit/{id}', [RegistrasiController::class, 'editRegistrasi'])->name('registrasi.edit');

Route::delete('/registrasi/delete/{id}', [RegistrasiController::class, 'deleteRegistrasi'])->name('registrasi.delete');





