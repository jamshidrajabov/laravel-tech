<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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


/*

Route::get('posts',[PostController::class,'index'])->name('index');
Route::get('posts/{post}',[PostController::class,'show'])->name('show');
Route::get('posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('posts/create',[PostController::class,'store'])->name('posts.store');
Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::put('posts/{post}/edit',[PostController::class,'update'])->name('posts.update');
Route::delete('posts/{post}/delete',[PostController::class,'delete'])->name('posts.delete');

*/
Route::get('delete_image/{post}',[PostController::class,'delete_image'])->name('delete_image');
Route::resource('posts',PostController::class);