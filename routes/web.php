<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('posts.index');
});
Route::get('/register', [RegisterController::class,'create']);
Route::post('/register', [RegisterController::class,'store']);


Route::get('/login', [SessionController::class,'create']);
Route::post('/login', [SessionController::class,'store']);
Route::post('/logout', [SessionController::class,'destroy']);

Route::get('index', [UserController::class,'index'])->name('home');
Route::get('author/dashboard', [AuthorController::class,'dashboard'])->name('author.dashboard');
Route::get('admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
