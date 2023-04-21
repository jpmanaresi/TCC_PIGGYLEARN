<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

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

Route::get('/', [CourseController::class, 'index']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/courses/create', [CourseController::class, 'create']);
Route::post('/courses',[CourseController::class, 'store']);
Route::get('/profile', [UserController::class, 'profile']);
Auth::routes();

Route::get('/home', [CourseController::class, 'index'])->name('home');
Route::get('/dashboard', [CourseController::class, 'dashboard'])->middleware('auth');

Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
