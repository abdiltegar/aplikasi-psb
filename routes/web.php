<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ParentController;
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
    Route::post('data-orang-tua/store', 'store')->name('data-orang-tua.store');
    Route::put('data-orang-tua/update/{id?}', 'update')->name('data-orang-tua.update');
    Route::delete('data-orang-tua/destroy/{id?}', 'destroy')->name('data-orang-tua.destroy');
});

Route::controller(DocumentController::class)->group(function () {
    Route::get('berkas', 'index')->name('berkas');
    Route::post('berkas/store', 'store')->name('berkas.store');
    Route::put('berkas/update/{id?}', 'update')->name('berkas.update');
    Route::delete('berkas/destroy/{id?}', 'destroy')->name('berkas.destroy');
});

