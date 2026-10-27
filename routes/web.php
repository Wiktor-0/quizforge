<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/o-projekcie', function () {
    return view('about');
})->name('about');

Route::get('/quizy', function () {
    $quizzes = [
        ['id' => 1, 'title' => 'Podstawy PHP', 'difficulty' => 'Łatwy'],
        ['id' => 2, 'title' => 'Stolice Europy', 'difficulty' => 'Średni'],
        ['id' => 3, 'title' => 'Kosmos', 'difficulty' => 'Trudny'],
    ];

    return view('quizzes.index', ['quizzes' => $quizzes]);
})->name('quizzes.index');

Route::get('/quizy/{id}', function (int $id) {
    return "Szczegóły quizu nr {$id}";
})->whereNumber('id')->name('quizzes.show');

Route::get('/quizy/{id}/start', function (int $id) {
    return "Rozpoczynasz quiz nr {$id}";
})->whereNumber('id')->name('quizzes.start');