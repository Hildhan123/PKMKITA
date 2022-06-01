<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\perekrutController;
use App\Http\Controllers\loginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*///

Route::get('/', function () {
    return view('welcome');
});

Route::get('/perekrut', [App\Http\Controllers\perekrutController::class, 'index'])->name('perekrut');
Route::get('/perekrut/mypkm', [App\Http\Controllers\perekrutController::class, 'my_pkm'])->name('perekrut.my_pkm');
Route::post('/perekrut/mypkm/proses', [App\Http\Controllers\perekrutController::class, 'my_pkm_proses'])->name('perekrut.proses.my_pkm_proses');
Route::patch('/perekrut/mypkm/proses', [App\Http\Controllers\perekrutController::class, 'my_pkm_switch'])->name('perekrut.proses.my_pkm_switch');
Route::get('/perekrut/calon-anggota', [App\Http\Controllers\perekrutController::class, 'calon_anggota'])->name('perekrut.calon_anggota');

Auth::routes();
// Route::get('/login', [App\Http\Controllers\loginController::class, 'login'])->name('login');
// Route::get('/register', [App\Http\Controllers\loginController::class, 'register'])->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
