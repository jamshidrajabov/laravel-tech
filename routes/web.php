<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\Comment;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[PageController::class,'main']);
Route::get('about',[PageController::class,'about'])->name('about');
Route::get('services',[PageController::class,'services'])->name('services');
Route::get('projects',[PageController::class,'projects'])->name('projects');
Route::get('contact',[PageController::class,'contact'])->name('contact');


Route::get('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'register'])->name('register');


Route::get('delete_image/{post}',[PostController::class,'delete_image'])->name('delete_image');
Route::resource('posts',PostController::class);
Route::resource('comments',CommentController::class);