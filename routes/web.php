<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\registerController;


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

Route::get('/test', function () {
    //dd('welcome');
    return view('includes/backmaster');
})->name('backmaster');

Route::get('/', function () {
    //dd('welcome');
    return view('home');
})->name('home');

Route::get('/admin', function () {
    dd('Welcome to the admin');
});

/*Route::get('/admin/users/{id}', function ($id) {
    dd('Welcome to the admin'.' user '.$id);
});*/

//Route::get('/admin/users/{id}', [UserController::class, 'getUser']); //user page

Route::get('/admin/users/{id}', [UserController::class, 'viewUser']); //view a single user

Route::get('/admin', [UserController::class, 'showUsers'])->name('showusers'); //for admin; lists all users

Route::get('/admin/users', [UserController::class, 'showUsers']);

Route::view('categories', 'categories')->name('categories');

Route::get('/register', [registerController::class, 'registerUser'])->name('register'); //register page

Route::post('/register', [registerController::class, 'saveUser'])->name('registeruser');

Route::post('/users/update/{id}', [UserController::class, 'updateUser'])->name('updateuser');

Route::post('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteuser');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');//for login
Route::post('/login', [AuthController::class, 'signin'])->name('signin');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function(){return view('dashboard');});