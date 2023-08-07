<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(ParentController::class)->group(function () {
    Route::get('data-orang-tua', 'index')->name('data-orang-tua');
    Route::patch('data-orang-tua', 'patch')->name('data-orang-tua.patch');
});

Route::controller(DocumentController::class)->group(function () {
    Route::get('berkas', 'index')->name('berkas');
    Route::patch('berkas', 'update')->name('berkas.patch');
    Route::delete('berkas', 'destroy')->name('berkas.destroy');
});

Route::controller(InformationController::class)->group(function () {
    Route::get('informasi', 'index')->name('informasi');

    Route::get('informasi/get', 'get')->name('informasi.get');
});

Route::controller(StudentController::class)->group(function () {
    Route::get('siswa', 'index')->name('siswa');

    Route::get('siswa/get', 'get')->name('siswa.get');
    Route::patch('siswa/ubah-status', 'ubahStatus')->name('siswa.ubah-status');
});

Route::controller(AccountController::class)->group(function () {
    Route::get('pengguna', 'index')->name('pengguna');

    Route::get('pengguna/get-all', 'get')->name('pengguna.get');
    Route::put('pengguna', 'update')->name('pengguna.update');
    Route::delete('pengguna', 'destroy')->name('pengguna.destroy');
});

