@extends('layouts.app')

@section('title', 'Strona główna | QuizForge')

@section('content')
    <section>
        <h1>Sprawdź swoją wiedzę z QuizForge</h1>

        <p>
            Wybieraj quizy, odpowiadaj na pytania i obserwuj swoje postępy.
        </p>

        <a href="{{ route('quizzes.index') }}">Zobacz dostępne quizy</a>
    </section>
@endsection