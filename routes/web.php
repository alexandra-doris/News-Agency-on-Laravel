<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\LocalizationController;


use App\Models\Category;
use App\Models\User;
use App\Models\Post;

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
Route::get('lang/{lang}',[LocalizationController::class, 'switchLang']);

Route::group(['middleware'=>'language'],function ()
{
    //your translation routes
    Route::get('/', function () {return view('home');})->name('home');
});

Route::get('/', function () {return view('home');})->name('home');

Route::any ( '/search/post', function () {
    $q = Request::get ( 'q' );
    $post_q = Post::where('status', 1)->where ( 'title', 'LIKE', '%' . $q . '%' )
    ->orWhere ( 'subtitle', 'LIKE', '%' . $q . '%' )
    ->orWhere ( 'body', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $post_q ) > 0)
        return view ( 'search',compact('post_q'));
    else
        return view ( 'search')->withMessage ( 'No Results found. Try to searching again!' );
} )->name('search');

//category

Route::view('categories', 'categories')->name('categories');

Route::get('/category/{slug}', [PublicController::class, 'viewCategory']);

//post frontend

Route::get('/post/{slug}', [PublicController::class, 'viewPost']);

//register frontend

Route::get('/register', [registerController::class, 'registerUser'])->name('register'); //register page

Route::post('/register', [registerController::class, 'saveUser'])->name('registeruser');


//--------------backend group
$router->group(['middleware' => 'auth'], function() {

//users backend

Route::get('/admin/users/{id}', [UserController::class, 'viewUser']); //view a single user

Route::view('/admin', 'allusers')->name('showusers'); //for admin; lists all users

Route::get('/admin/users', [UserController::class, 'showUsers']);


Route::get('/admin/newuser', [registerController::class, 'registerUserAdmin'])->name('registeradmin'); //register for admin

Route::post('/admin/newuser', [registerController::class, 'saveUser'])->name('adduser');

Route::post('/users/update/{id}', [UserController::class, 'updateUser'])->name('updateuser'); //update user || view user

Route::get('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteuser');

//category backend

Route::get('/admin/newcategory', [CategoryController::class, 'createCategory'])->name('categoryadmin'); //create category

Route::post('/admin/newcategory', [CategoryController::class, 'saveCategory'])->name('addcategory');

Route::view('/admin/category', 'allcategories')->name('allcategories'); //for admin; lists all categories

Route::get('/admin/category/{id}', [CategoryController::class, 'viewCategory']); //view a single category

Route::post('/admin/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('updatecategory'); //update user || view user

Route::get('/admin/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('deletecategory');

//post backend

Route::get('/admin/newpost', [PostController::class, 'createPost'])->name('postadmin'); //create post

Route::post('/admin/newpost', [PostController::class, 'savePost'])->name('addpost');

Route::view('/admin/post', 'allposts')->name('allposts'); //for admin; lists all posts

Route::get('/admin/post/{id}', [PostController::class, 'viewPost']); //view a single post

Route::post('/admin/post/update/{id}', [PostController::class, 'updatePost'])->name('updatepost'); //update post || view post

Route::get('/admin/post/delete/{id}', [PostController::class, 'deletePost'])->name('deletepost');

});

// login

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');//for login
Route::post('/login', [AuthController::class, 'signin'])->name('signin');

//logout

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Route::get('/dashboard', function(){return view('dashboard');});

View::composer(['*'], function($view){
    $auth_user = Auth::user();
    $users=User::Paginate(10);
    $cats=Category::Paginate(10);
    $posts=Post::orderBy('status', 'ASC')->orderBy('created_at', 'DESC')->simplepaginate(10);
    $public_posts=Post::where('status', 1)->orderBy('created_at', 'DESC')->simplepaginate(10);

    $view->with('auth_user',$auth_user)
    ->with('users',$users)
    ->with('cats',$cats)
    ->with('posts',$posts)
    ->with('public_posts',$public_posts);
});