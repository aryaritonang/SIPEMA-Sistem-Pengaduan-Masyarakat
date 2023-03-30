<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    return view('main');
});

Route::middleware(['web'])->group(function () {
    Route::get('/main', [MainController::class, 'index'])->name('main.index');
    Route::get('/main/complaint', [MainController::class, 'complaint'])->name('main.complaint')->middleware('auth');
    Route::get('/main/history', [MainController::class, 'history'])->name('main.history')->middleware('auth');
    Route::get('/main/logout', [MainController::class, 'logout'])->name('main.logout')->middleware('auth');
    Route::get('/main/assignDone', [MainController::class, 'assignDone'])->name('main.assignDone')->middleware('auth');
    Route::get('/main/assignUndone', [MainController::class, 'assignUndone'])->name('main.assignUndone')->middleware('auth');
    Route::get('/main/aduan', [MainController::class, 'aduan'])->name('main.aduan')->middleware('auth');
    Route::get('/main/deleteComplaint', [MainController::class, 'deleteComplaint'])->name('main.deleteComplaint')->middleware('auth');
    Route::post('/main/checkinput', [MainController::class, 'checkinput'])->name('main.checkinput');

    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login/checklogin', [LoginController::class, 'checklogin'])->name('login.checklogin');
    Route::get('/login/successlogin', [LoginController::class, 'successlogin'])->name('login.successlogin');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register/checkregister', [RegisterController::class, 'checkregister'])->name('register.checkregister');
    Route::get('/register/successregister', [RegisterController::class, 'successregister'])->name('register.successregister');
    
});