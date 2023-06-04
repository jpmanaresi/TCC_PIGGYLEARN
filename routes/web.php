<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TestController;

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
Route::put('/courses',[CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');


/*Aulas*/
Route::get('/courses/{id}/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
Route::get('courses/{course}/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
Route::post('/courses/{id}',[LessonController::class, 'store'])->name('lessons.store');
Route::put('/courses/{id}/lessons/{lesson_id}',[LessonController::class, 'update'])->name('lessons.update');
Route::delete('/courses/{course}/lessons/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy');

/*Testes/Avaliações */
Route::get('/courses/{id}/lessons/{lesson}/tests/create', [TestController::class, 'create'])->name('tests.create');
Route::post('/tests',[TestController::class, 'store'])->name('tests.store');
Route::put('/tests/{id}',[TestController::class, 'store'])->name('tests.update');
Route::delete('/tests/{id}', [TestController::class, 'destroy'])->name('tests.destroy');


/* Usuário */
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [CourseController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
