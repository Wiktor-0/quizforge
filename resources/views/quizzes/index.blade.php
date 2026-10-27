@extends('layouts.app')

@section('title', 'Dostępne quizy | QuizForge')

@section('content')
    <h1>Dostępne quizy</h1>

    <ul>
        @foreach ($quizzes as $quiz)
            <li>
                <a href="{{ route('quizzes.show', $quiz['id']) }}">
                    {{ $quiz['title'] }}
                </a>
                — poziom: {{ $quiz['difficulty'] }}
            </li>
        @endforeach
    </ul>
@endsection