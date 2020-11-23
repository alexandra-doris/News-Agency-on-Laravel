<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;



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
})->name('home');

Route::get('/admin/users/{id}', [UserController::class, 'viewUser']); //view a single user

Route::get('/admin', [UserController::class, 'showUsers'])->name('showusers'); //for admin; lists all users

Route::get('/admin/users', [UserController::class, 'showUsers']);

Route::view('categories', 'categories')->name('categories');

Route::get('/register', [registerController::class, 'registerUser'])->name('register'); //register page

Route::post('/register', [registerController::class, 'saveUser'])->name('registeruser');

Route::get('/admin/newuser', [registerController::class, 'registerUserAdmin'])->name('registeradmin'); //register for admin

Route::post('/admin/newuser', [registerController::class, 'saveUser'])->name('adduser');

Route::post('/users/update/{id}', [UserController::class, 'updateUser'])->name('updateuser'); //update user || view user

Route::get('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteuser');

//category

Route::get('/admin/newcategory', [CategoryController::class, 'createCategory'])->name('categoryadmin'); //create category

Route::post('/admin/newcategory', [CategoryController::class, 'saveCategory'])->name('addcategory');

Route::get('/admin/category', [CategoryController::class, 'showCategories'])->name('allcategories'); //for admin; lists all categories

Route::get('/admin/category/{id}', [CategoryController::class, 'viewCategory']); //view a single category

Route::post('/admin/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('updatecategory'); //update user || view user

Route::get('/admin/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('deletecategory');

//post

Route::get('/admin/newpost', [PostController::class, 'createPost'])->name('postadmin'); //create post

Route::post('/admin/newpost', [PostController::class, 'savePost'])->name('addpost');

Route::get('/admin/post', [PostController::class, 'showPosts'])->name('allposts'); //for admin; lists all posts

Route::get('/admin/post/{id}', [PostController::class, 'viewPost']); //view a single post

Route::post('/admin/post/update/{id}', [PostController::class, 'updatePost'])->name('updatepost'); //update post || view post

Route::get('/admin/post/delete/{id}', [PostController::class, 'deletePost'])->name('deletepost');

// login

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');//for login
Route::post('/login', [AuthController::class, 'signin'])->name('signin');

//logout

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function(){return view('dashboard');});