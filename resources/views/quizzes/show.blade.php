@extends('layouts.app')

@section('title', $quiz->title . ' | QuizForge')

@section('content')
    <h1>{{ $quiz->title }}</h1>

    <p>{{ $quiz->description }}</p>

    <dl>
        <dt>Poziom trudności</dt>
        <dd>{{ $quiz->difficulty }}</dd>

        <dt>Liczba pytań</dt>
        <dd>{{ $quiz->questions->count() }}</dd>
    </dl>

    <a href="{{ route('quizzes.start', $quiz->id) }}">
        Rozpocznij quiz
    </a>

    <p>
        <a href="{{ route('quizzes.index') }}">
            Wróć do listy quizów
        </a>
    </p>
@endsection