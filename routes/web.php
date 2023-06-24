<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavireController;
use App\Http\Controllers\UserController;
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
    return view('index');
});

// authentification

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// navires

Route::get('navires', [NavireController::class, 'getNavires'])->name('navires');
Route::get('navire/{id}', [NavireController::class, 'getNavire'])->name('navire');;

// Users

Route::get('users/{id}', [UserController::class, 'getUsers'])->name('users');

// search users by specialite

Route::post('/searchSpecialite/{id}', [UserController::class, 'searchSpecialite']);


