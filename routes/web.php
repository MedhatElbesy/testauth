<?php

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
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;

Route::resource('articles', ArticleController::class);
// Route::post('upload-image', [ArticleController::class, 'uploadImage'])->name('upload_image');
// Route::post('/upload', [HomeController::class, 'upload'])->name('ckeditor.upload');
// Route::post('/medhat', [HomeController::class, 'create']);

// Route::post('/upload', [HomeController::class, 'upload']);  // Route for CKEditor image upload
Route::post('/medhat', [HomeController::class, 'create']);  // Route for saving the article
Route::get('/show', [HomeController::class, 'show']);
Route::post('/upload', [HomeController::class, 'upload'])->name('ckeditor.upload');

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Auth;

// Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Route::post('logout', function () {
//     Auth::logout();
//     return redirect('/');
// })->name('logout');



Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
