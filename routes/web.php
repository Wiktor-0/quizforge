<?php

use App\Http\Controllers\QuizController;
use App\Http\Middleware\EnsureQuizRulesAccepted;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/o-projekcie', function () {
    return view('about');
})->name('about');

Route::get('/zasady', [QuizController::class, 'rules'])
    ->name('rules.show');

Route::post('/zasady/akceptuj', [QuizController::class, 'acceptRules'])
    ->name('rules.accept');

Route::get('/quizy', [QuizController::class, 'index'])
    ->name('quizzes.index');

Route::get('/quizy/{id}', [QuizController::class, 'show'])
    ->whereNumber('id')
    ->name('quizzes.show');

Route::get('/quizy/{id}/start', [QuizController::class, 'start'])
    ->whereNumber('id')
    ->middleware(EnsureQuizRulesAccepted::class)
    ->name('quizzes.start');