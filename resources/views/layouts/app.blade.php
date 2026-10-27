<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'QuizForge')</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('home') }}">QuizForge</a>
            <a href="{{ route('quizzes.index') }}">Quizy</a>
            <a href="{{ route('about') }}">O projekcie</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>