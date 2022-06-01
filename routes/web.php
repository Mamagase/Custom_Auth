<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

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
    return view('auth.login');
});

//Auth routes 
Route::get('login', [UserAuthController::class, 'login'])->middleware('alreadyLoggedIn'); //Login route
Route::get('register', [UserAuthController::class, 'register'])->middleware('alreadyLoggedIn'); //Register route
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create'); //Route to create an account
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check'); //Route to check user
Route::get('profile', [UserAuthController::class, 'profile'])->middleware('isLogged'); //Profile route
Route::get('logout', [UserAuthController::class, 'logout']); //Route to logout