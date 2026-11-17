@extends('layouts.app')

@section('title', 'Wynik: ' . $quiz->title . ' | QuizForge')

@section('content')
    <header>
        <h1>Wynik quizu: {{ $quiz->title }}</h1>

        <p>
            Zdobyte punkty:
            <strong>{{ $score }} / {{ $maximumScore }}</strong>
        </p>

        <p>
            Wynik procentowy:
            <strong>{{ $percentage }}%</strong>
        </p>
    </header>

    <h2>Podsumowanie odpowiedzi</h2>

    @foreach ($results as $result)
        <article>
            <h3>
                Pytanie {{ $loop->iteration }}:
                {{ $result['question']->content }}
            </h3>

            <p>
                Twoja odpowiedź:
                <strong>{{ $result['selectedAnswer']->content }}</strong>
            </p>

            @if ($result['isCorrect'])
                <p>Odpowiedź poprawna.</p>
            @else
                <p>Odpowiedź niepoprawna.</p>

                <p>
                    Poprawna odpowiedź:
                    <strong>{{ $result['correctAnswer']->content }}</strong>
                </p>
            @endif
        </article>
    @endforeach

    <p>
        <a href="{{ route('quizzes.start', $quiz->id) }}">
            Rozwiąż quiz ponownie
        </a>
    </p>

    <p>
        <a href="{{ route('quizzes.index') }}">
            Wróć do listy quizów
        </a>
    </p>
@endsection