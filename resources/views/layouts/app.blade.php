<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'QuizForge')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <nav class="navigation">
            <a class="logo" href="{{ route('home') }}">
                QuizForge
            </a>

            <div class="navigation-links">
                <a href="{{ route('home') }}">Strona główna</a>
                <a href="{{ route('quizzes.index') }}">Quizy</a>
                <a href="{{ route('about') }}">O projekcie</a>
            </div>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer class="site-footer">
        <p>QuizForge — sprawdź swoją wiedzę.</p>
    </footer>
</body>
</html>