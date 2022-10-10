<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class,'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class,'show'])->name('posts.show');


Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class,'create']);
    Route::post('/register', [RegisterController::class,'store']);
    Route::get('/login', [SessionController::class,'create']);
    Route::post('/login', [SessionController::class,'store']);
});



Route::post('/logout', [SessionController::class,'destroy'])->middleware('auth');


Route::middleware(['author','auth','auth.session'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('admin/authors/create', [AdminController::class,'create'])->name('admin.author-create');
    Route::post('admin/authors/store', [AdminController::class,'store'])->name('admin.author-store');
    Route::delete('admin/authors/{user:username}', [AdminController::class,'destroy'])->name('admin.author-delete');
});



Route::middleware(['author','auth','auth.session'])->group(function () {
    Route::get('author/dashboard', [AuthorController::class,'dashboard'])->name('author.dashboard');
    Route::get('/author/posts/create', [PostController::class,'create'])->name('author.create-post');
    Route::post('/author/posts/create', [PostController::class,'store'])->name('author.create-post');
    Route::get('/author/posts/{post:slug}/edit', [PostController::class,'edit'])->name('author.edit-post');
    Route::patch('/author/posts/{post:slug}', [PostController::class,'update'])->name('author.post-update');
    Route::delete('/author/posts/{post:slug}', [PostController::class,'destroy'])->name('author.post-delete');
});
Route::get('/ping', function () {
});
