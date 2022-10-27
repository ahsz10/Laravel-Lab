<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('new-route', [TestController::class],'test');
// Route::get('create', function (){return "we are here!";});
// Route::get('create', [PostController::class,'create']);
Route::get('posts', [PostController::class,'index'])->name('posts.index')->middleware('auth');
// Route::get('posts', [PostController::class,'index']);
Route::get('posts/create', [PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


// Route::get('/posts/{post}/comments', [CommentsController::class, 'index'])->name('posts.comment');
Route::post('/posts/{post}/comments', [CommentsController::class, 'store'])->name('posts.comment.store');
Route::delete('/posts/{post}/comments', [CommentsController::class, 'destroy'])->name('posts.comment.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
