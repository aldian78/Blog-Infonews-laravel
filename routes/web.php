<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\backend\TagsController;
use App\Http\Controllers\backend\BlogsController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\CategoriController;
use App\Http\Controllers\backend\ContactsController;
use App\Http\Controllers\backend\RegisterController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\SendEmailController;

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

// FRONTEND
Route::get('/', [HomeController::class, 'index']);

//route simpel dengan syarat class tertentu > lihat didokumentasi route bagian bawah 
Route::resource('about', AboutController::class);
Route::resource('contact', ContactController::class);

// Route::resource('/', BlogController::class);

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/detail/{blog:slug}', [BlogController::class, 'detail']);
Route::get('/blog/{categori:slug}', [BlogController::class, 'by_categori']);

Route::post('/contacts/store', [ContactsController::class, 'store']);
Route::delete('/contacts/{id}', [ContactsController::class, 'destroy'])->middleware('auth');

Route::post('/like/store', [BlogController::class, 'likeBlog']);
// END FRONTEND

// BACKEND
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//name route > untuk mengakses route asalkan namanya sama
//middleware auth untuk user yg sudah login, sedangkan guest untuk user yg belum login 
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/forgotPassword', [LoginController::class, 'forgot_password']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/blogs/checkSlug', [BlogsController::class, 'checkSlug'])->middleware('auth');
Route::resource('/blogs', BlogsController::class)->middleware('auth');

Route::get('/category/checkSlug', [CategoriController::class, 'checkSlug'])->middleware('auth');
Route::resource('/category', CategoriController::class)->except(['create', 'show', 'edit'])->middleware('auth');

Route::get('/hastags/checkSlug', [TagsController::class, 'checkSlug'])->middleware('auth');
Route::resource('/hastags', TagsController::class)->except(['create', 'show', 'edit'])->middleware('auth');

Route::get('/contacts', [ContactsController::class, 'index'])->middleware('auth');

Route::get('/subscribe', [DashboardController::class, 'indexSubscribe'])->middleware('auth');
Route::post('/subscribe/store', [DashboardController::class, 'storeSubscribe']);
Route::delete('/subscribe/{id}', [DashboardController::class, 'destroySubscribe']);

Route::get('/sendEmail/{id}', [SendEmailController::class, 'sendContact'])->middleware('auth');
// END BACKEND