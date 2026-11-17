@extends('layouts.app')

@section('title', 'Dostępne quizy | QuizForge')

@section('content')
    <h1>Dostępne quizy</h1>

    @forelse ($quizzes as $quiz)
        <article>
            <h2>
                <a href="{{ route('quizzes.show', $quiz->id) }}">
                    {{ $quiz->title }}
                </a>
            </h2>

            <p>{{ $quiz->description }}</p>

            <p>
                Poziom: {{ $quiz->difficulty }}
                |
                Liczba pytań: {{ $quiz->questions_count }}
            </p>

            <a href="{{ route('quizzes.show', $quiz->id) }}">
                Zobacz szczegóły
            </a>
        </article>
    @empty
        <p>Nie ma obecnie dostępnych quizów.</p>
    @endforelse
@endsection