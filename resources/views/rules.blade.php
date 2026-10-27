@extends('layouts.app')

@section('title', 'Zasady quizu | QuizForge')

@section('content')
    <h1>Zasady quizu</h1>

    @if (session('warning'))
        <p>{{ session('warning') }}</p>
    @endif

    <ul>
        <li>Na każde pytanie wybierz jedną odpowiedź.</li>
        <li>Nie odświeżaj strony podczas rozwiązywania quizu.</li>
        <li>Po zakończeniu zobaczysz swój wynik.</li>
    </ul>

    <form method="POST" action="{{ route('rules.accept') }}">
        @csrf
        <button type="submit">Akceptuję zasady</button>
    </form>
@endsection