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
Route::get('navire/{navire_id}', [NavireController::class, 'getNavire'])->name('navire');;

// USERS

// get users by navire

Route::get('users/{navire_id}', [UserController::class, 'getUsers'])->name('users'); // a appeler return redirect()->route('users',$navire_id);

// search users by specialite on a navire

Route::post('/searchSpecialite/{navire_id}', [UserController::class, 'searchSpecialite']);

// order users by age on a navire

Route::get('/orderByAge/{navire_id}', [UserController::class, 'orderByAge']);

// get user profile

Route::get('user/{user_id}', [UserController::class, 'getUser'])->name('user');




