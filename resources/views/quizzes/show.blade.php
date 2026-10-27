@extends('layouts.app')

@section('title', $quiz['title'] . ' | QuizForge')

@section('content')
    <h1>{{ $quiz['title'] }}</h1>

    <p>Poziom trudności: {{ $quiz['difficulty'] }}</p>

    <a href="{{ route('quizzes.start', $quiz['id']) }}">
        Rozpocznij quiz
    </a>

    <p>
        <a href="{{ route('quizzes.index') }}">Wróć do listy quizów</a>
    </p>
@endsection