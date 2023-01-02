<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});
Route::get('/db', function () {
    return view('dbconn');
});

//display
Route::get('/post',[PostController::class,'show']);
//Route::get('/post/create',[PostController::class,'show'])->name('post');

//create
Route::view('/create','create');
Route::post('store',[PostController::class,'store']);
//Delete
Route::delete('post/{id}',[PostController::class,'destroy'])->name('destroy');

//Edit
Route::get('post/edit/{id}',[PostController::class,'edit'])->name('edit');

Route::PATCH('post/update/{id}',[PostController::class,'update'])->name('update');




