<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CustomController;



/*
|--------------------------------------------------------------------------
| Web Routes

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
    return view('welcome');
});
Route::get('/db', function () {
    return view('dbconn');
});
 


   //display for crud
// Route::get('/post',[PostController::class,'show']);
// //Route::get('/post/create',[PostController::class,'show'])->name('post');

// //create
// Route::view('create','create');
// Route::post('store',[PostController::class,'store']);
// //Delete
// Route::delete('post/{id}',[PostController::class,'destroy'])->name('destroy');

// //Edit
// Route::get('edit/{id}',[PostController::class,'edit'])->name('edit');

// Route::PATCH('post/update/{id}',[PostController::class,'update'])->name('update');









Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//custom authentication routes

Route::get('custom/login',[CustomController::class, 'index'])->name('custom/login');
Route::post('login',[CustomController::class, 'postLogin']);
Route::get('registration',[CustomController::class, 'registration'])->name('registration');
Route::post('custom-Registration',[CustomController::class, 'postRegister']);

//Route::get('dashboard',[CustomController::class, 'dashboard']);
//Route::view('login','custom/login');
//Route::view('register','custom/register');
Route::get('logout', [CustomController::class, 'logout']);




//Admin Lte Dashboard

//Route::view('dashboard','admin');
Route::get('dashboard',[CustomController::class, 'dashboard'])->name('dashboard');


//authentication checking for admin lte
Route::group(['middleware'=>'auth'],function(){
//display
Route::get('/post',[PostController::class,'show']);
//Route::get('/post/create',[PostController::class,'show'])->name('post');



//create
Route::view('create','create');
Route::post('store',[PostController::class,'store']);
//Delete
Route::delete('post/{id}',[PostController::class,'destroy'])->name('destroy');

//Edit
Route::get('edit/{id}',[PostController::class,'edit'])->name('edit');

Route::PATCH('post/update/{id}',[PostController::class,'update'])->name('update');



});

