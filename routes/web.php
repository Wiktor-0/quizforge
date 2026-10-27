<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/o-projekcie', function () {
    return view('about');
})->name('about');

Route::get('/quizy', function () {
    return 'Lista quizów';
})->name('quizzes.index');

Route::get('/quizy/{id}', function (int $id) {
    return "Szczegóły quizu nr {$id}";
})->whereNumber('id')->name('quizzes.show');

Route::get('/quizy/{id}/start', function (int $id) {
    return "Rozpoczynasz quiz nr {$id}";
})->whereNumber('id')->name('quizzes.start');