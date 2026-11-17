@extends('layouts.app')

@section('title', $quiz->title . ' | QuizForge')

@section('content')
    <header>
        <h1>{{ $quiz->title }}</h1>

        <p>{{ $quiz->description }}</p>

        <p>
            Poziom: {{ $quiz->difficulty }}
            |
            Liczba pytań: {{ $quiz->questions->count() }}
        </p>
    </header>

    @forelse ($quiz->questions as $question)
        <section>
            <h2>
                Pytanie {{ $loop->iteration }}:
                {{ $question->content }}
            </h2>

            <ul>
                @foreach ($question->answers as $answer)
                    <li>{{ $answer->content }}</li>
                @endforeach
            </ul>
        </section>
    @empty
        <p>Ten quiz nie zawiera jeszcze żadnych pytań.</p>
    @endforelse

    <p>
        <a href="{{ route('quizzes.show', $quiz->id) }}">
            Wróć do szczegółów quizu
        </a>
    </p>
@endsection