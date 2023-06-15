<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\kerjasamaController;
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

Route::controller(AuthController::class)->group( function(){
    Route::get('register','register')->name('register');
    
    Route::post('register','registerSimpan')->name('register.simpan');

    Route::post('login','loginAksi')->name('login.aksi');
});

Route::get('/', function () {
    return view('dashboard');
});



Route::controller(kerjasamaController::class,)->prefix('kerjasama')->group(function(){
    Route::get('','index')->name('kerjasama');
    Route::get('tambah','tambah')->name('kerjasama.tambah');
    Route::post('tambah','simpan')->name('kerjasama.tambah.simpan');
    Route::get('edit/{id}','edit')->name('kerjasama.edit');
    Route::post('edit/{id}','update')->name('kerjasama.tambah.update');
    Route::get('hapus/{id}','hapus')->name('kerjasama.hapus');
});


