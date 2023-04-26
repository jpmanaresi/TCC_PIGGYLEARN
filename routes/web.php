<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;

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
/* Index */
Route::get('/', [CourseController::class, 'index']);
Route::get('/home', [CourseController::class, 'index'])->name('home');


/* Rotas das Views de Cursos */
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::get('/courses/show/{id}',[CourseController::class, 'show']);
Route::post('/courses',[CourseController::class, 'store'])->name('courses.store');

/*Aulas*/
Route::get('/courses/{id}/lessons/create', [LessonController::class, 'create']);
Route::post('/courses/{id}',[LessonController::class, 'store']);

/* Usuário */
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [CourseController::class, 'dashboard'])->middleware('auth');
Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
