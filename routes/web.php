<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    //dd('welcome');
    return view('home');
});

Route::get('/admin', function () {
    dd('Welcome to the admin');
});

/*Route::get('/admin/users/{id}', function ($id) {
    dd('Welcome to the admin'.' user '.$id);
});*/

Route::get('/admin/users/{id}', [UserController::class, 'getUser']); //user page

Route::get('/admin', [UserController::class, 'showUsers']); //for admin; lists all users

Route::view('categories', 'categories');

Route::get('/admin/register', [UserController::class, 'registerUser']); //register page

Route::post('/admin/register', [UserController::class, 'saveUser'])->name('registeruser');
