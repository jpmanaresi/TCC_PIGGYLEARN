<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;

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

/* Calculadora Financeira */
Route::get('/calculator', [CourseController::class, 'calculator'])->name('calc');

/* Rotas das Views de Cursos */
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create')->middleware('auth');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit')->middleware('auth');
Route::get('/courses/{id}/show',[CourseController::class, 'show'])->name('courses.show')->middleware('auth');
Route::post('/courses',[CourseController::class, 'store'])->name('courses.store');
Route::post('/courses/{course}/start',[CourseController::class, 'start'])->name('courses.start');
Route::put('/courses',[CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

/* Aulas */
Route::get('/courses/{id}/lessons/create', [LessonController::class, 'create'])->name('lessons.create')->middleware('auth');
Route::get('courses/{course}/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit')->middleware('auth');
Route::get('/courses/{course}/lessons/{lesson}/show',[LessonController::class, 'show'])->name('lessons.show')->middleware('auth');
Route::post('/courses/{id}',[LessonController::class, 'store'])->name('lessons.store');
Route::post('/courses/{course}/lessons/{lesson}/next',[LessonController::class, 'next'])->name('lessons.next');
Route::put('/courses/{id}/lessons/{lesson_id}',[LessonController::class, 'update'])->name('lessons.update');
Route::delete('/courses/{course}/lessons/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy');

/* Testes/Avaliações */
Route::get('/courses/{id}/lessons/{lesson}/tests/create', [TestController::class, 'create'])->name('tests.create')->middleware('auth');
Route::get('/lessons/{lesson}/tests/{test}/edit', [TestController::class, 'edit'])->name('tests.edit')->middleware('auth');
Route::get('/courses/{course}/lessons/{lesson}/tests/{test}/show',[TestController::class, 'show'])->name('tests.show')->middleware('auth');
Route::get('tests/{test}/end',[TestController::class, 'end'])->name('tests.end')->middleware('auth');
Route::post('/tests',[TestController::class, 'store'])->name('tests.store');
Route::post('/courses/{course}/lessons/{lesson}/tests/{test}/start',[TestController::class, 'start'])->name('tests.start');
Route::post('/courses/{course}/lessons/{lesson}/tests/{test}/nextlesson',[TestController::class, 'nextlesson'])->name('tests.nextlesson');
Route::put('/tests/{id}',[TestController::class, 'update'])->name('tests.update');
Route::delete('/lessons/{lesson}/tests/{id}', [TestController::class, 'destroy'])->name('tests.destroy');

/* Questões das avaliações */
Route::get('/courses/{course}/lessons/{lesson}/tests/{test}/questions/create', [QuestionController::class, 'create'])->name('questions.create')->middleware('auth');
Route::get('/tests/{test}/questions/{question}/edit/', [QuestionController::class, 'edit'])->name('questions.edit')->middleware('auth');
Route::get('/courses/{course}/lessons/{lesson}/tests/{test}/questions/{question}/show',[QuestionController::class, 'show'])->name('questions.show')->middleware('auth');
Route::post('/validate-answer',[QuestionController::class, 'validateAnswer']);
Route::post('/questions',[QuestionController::class, 'store'])->name('questions.store');
Route::post('/questions/next',[QuestionController::class, 'next']);
Route::put('/questions/{id}',[QuestionController::class, 'update'])->name('questions.update');
Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

/* Usuário */
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('/login', [UserController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [CourseController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Auth::routes();

/* Créditos */
route::get('/credits', function () {
    return view('credit');
})->name('credits');

