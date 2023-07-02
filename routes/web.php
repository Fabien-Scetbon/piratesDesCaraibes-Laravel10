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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->middleware(['guest'])->name('login');
    Route::post('/post-login', 'postLogin')->name('login.post');
    Route::get('/registration', 'registration')->middleware(['guest'])->name('register');
    Route::post('/post-registration', 'postRegistration')->name('register.post');
    Route::get('/dashboard', 'dashboard');
    Route::get('/logout', 'logout')->name('logout');
});

// NAVIRES->middleware('verifyNavireId')

Route::controller(NavireController::class)->group(function () {
    Route::get('/navires', 'getNavires')->name('navires');
    Route::get('/navire/{navire_id}', 'getNavire')->middleware(['auth', 'verifyNavireId'])->name('navire');
});

// USERS

Route::controller(UserController::class)->middleware(['auth'])->group(function () {

    // get users by navire
    Route::get('/users/{navire_id}', 'getUsers')->middleware(['verifyNavireId'])->name('users'); // a appeler return redirect()->route('users',$navire_id))->with([tableau asso;

    // search users by specialite on a navire
    Route::post('/searchSpecialite/{navire_id}', 'searchSpecialite');

    // order users by age on a navire
    Route::get('/orderByAge/{navire_id}', 'orderByAge')->name('orderbyage');

    Route::prefix('user')->group(function () {

        // create user
        Route::get('/add', 'addUser')->middleware(['captain'])->name('adduser');
        Route::post('/create', 'createUser')->name('createuser');

        // get user profile
        Route::get('/{user_id}', 'getUser')->middleware(['isSameNavire'])->name('user'); // ordre des routes important sinon /user/add avec add pris pour {user_id}

        // edit user
        Route::get('/edit/{user_id}', 'editUser')->middleware(['isSameNavire', 'captain'])->name('edituser');
        Route::put('/update/{user_id}', 'updateUser')->name('updateuser');

        // delete user
        Route::delete('/delete/{user_id}', 'deleteUser')->middleware(['captain'])->name('deleteuser');
    });
});
