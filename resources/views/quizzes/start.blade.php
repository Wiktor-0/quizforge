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

    @if ($errors->any())
        <section>
            <h2>Formularz zawiera błędy</h2>
            <p>Odpowiedz na wszystkie pytania przed wysłaniem quizu.</p>
        </section>
    @endif

    <form method="POST" action="{{ route('quizzes.submit', $quiz->id) }}">
        @csrf

        @forelse ($quiz->questions as $question)
            <fieldset>
                <legend>
                    Pytanie {{ $loop->iteration }}:
                    {{ $question->content }}
                </legend>

                @foreach ($question->answers as $answer)
                    <label>
                        <input
                            type="radio"
                            name="answers[{{ $question->id }}]"
                            value="{{ $answer->id }}"
                            @checked(
                                old('answers.' . $question->id) == $answer->id
                            )
                        >

                        {{ $answer->content }}
                    </label>

                    <br>
                @endforeach

                @error('answers.' . $question->id)
                    <p>{{ $message }}</p>
                @enderror
            </fieldset>
        @empty
            <p>Ten quiz nie zawiera jeszcze żadnych pytań.</p>
        @endforelse

        @if ($quiz->questions->isNotEmpty())
            <button type="submit">
                Sprawdź wynik
            </button>
        @endif
    </form>

    <p>
        <a href="{{ route('quizzes.show', $quiz->id) }}">
            Wróć do szczegółów quizu
        </a>
    </p>
@endsection