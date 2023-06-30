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
    Route::get('/login', 'index')->name('login');
    Route::post('/post-login', 'postLogin')->name('login.post');
    Route::get('/registration', 'registration')->name('register');
    Route::post('/post-registration', 'postRegistration')->name('register.post');
    Route::get('/dashboard', 'dashboard');
    Route::get('/logout', 'logout')->name('logout');
});

// NAVIRES

Route::controller(NavireController::class)->group(function () {
    Route::get('/navires', 'getNavires')->name('navires');
    Route::get('/navire/{navire_id}', 'getNavire')->name('navire');
});

// USERS

Route::controller(UserController::class)->group(function () {

    // get users by navire
    Route::get('/users/{navire_id}', 'getUsers')->name('users'); // a appeler return redirect()->route('users',$navire_id))->with([tableau asso;

    // search users by specialite on a navire
    Route::post('/searchSpecialite/{navire_id}', 'searchSpecialite');

    // order users by age on a navire
    Route::get('/orderByAge/{navire_id}', 'orderByAge')->name('orderbyage');;

    // create user
    Route::get('/user/add', 'addUser')->name('adduser'); // QUESTION ordre des routes importants sinon /user/add avec add comme {user_id}
    Route::post('/user/create', 'createUser')->name('createuser');

    // get user profile
    Route::get('/user/{user_id}', 'getUser')->name('user');

    // edit user
    Route::get('user/edit/{user_id}', 'editUser')->name('edituser');
    Route::put('user/update/{user_id}', 'updateUser')->name('updateuser');

    // delete user
    Route::delete('user/delete/{user_id}', 'deleteUser')->name('deleteuser');


});
