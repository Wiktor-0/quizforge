# QuizForge

QuizForge to aplikacja internetowa do rozwiązywania quizów, rozwijana etapami w ramach projektu zaliczeniowego.

Aplikacja została utworzona w Laravelu i wykorzystuje widoki Blade, bazę SQLite, modele Eloquent, kontrolery, middleware, formularze oraz walidację.

## Aktualne funkcje

- strona główna aplikacji;
- lista dostępnych quizów;
- szczegóły wybranego quizu;
- poziom trudności i liczba pytań;
- dynamiczne wyświetlanie pytań i odpowiedzi;
- akceptowanie zasad przed rozpoczęciem quizu;
- własny middleware ograniczający dostęp;
- formularz z odpowiedziami typu radio;
- walidacja wszystkich odpowiedzi;
- sprawdzanie, czy odpowiedź należy do właściwego pytania;
- obliczanie punktów i wyniku procentowego;
- podsumowanie poprawnych i błędnych odpowiedzi;
- dane przechowywane w bazie SQLite;
- modele i relacje Eloquent;
- migracje i seeder z przykładowymi quizami;
- responsywny wygląd aplikacji.

## Technologie

- PHP 8.3 lub nowszy;
- Laravel 13;
- Composer;
- Blade;
- SQLite;
- HTML;
- CSS;
- Git i GitHub.

## Struktura danych

Aplikacja wykorzystuje trzy główne modele:

```text
Quiz
 └── Question
      └── Answer
```

Relacje:

- jeden quiz posiada wiele pytań;
- jedno pytanie należy do jednego quizu;
- jedno pytanie posiada wiele odpowiedzi;
- jedna odpowiedź należy do jednego pytania.

## Przykładowe dane

Seeder tworzy:

- 3 quizy;
- 9 pytań;
- 27 odpowiedzi.

Dostępne quizy:

1. Podstawy PHP;
2. Stolice Europy;
3. Kosmos.

---

# Wymagania

Do uruchomienia projektu potrzebne są:

- Git;
- PHP 8.3 lub nowszy;
- Composer;
- rozszerzenie PHP obsługujące SQLite.

Sprawdzenie wersji:

```bash
git --version
php --version
composer --version
```

Projekt nie uruchomi się na PHP 8.2. Zalecane jest PHP 8.3, 8.4 lub nowsze zgodne z wymaganiami zapisanymi w `composer.json`.

---

# Instalacja na Windows

## 1. Instalacja środowiska

Zainstaluj:

- [Git dla Windows](https://git-scm.com/download/win)
- [Laravel Herd](https://herd.laravel.com/windows)
- [Visual Studio Code](https://code.visualstudio.com/)

Laravel Herd dostarcza PHP oraz Composer.

Po instalacji zamknij i ponownie uruchom terminal lub VS Code.

Sprawdź narzędzia:

```powershell
git --version
php --version
composer --version
```

Sprawdź, z której instalacji PHP korzysta system:

```powershell
where.exe php
```

PHP musi mieć wersję co najmniej 8.3.

## 2. Przygotowanie katalogu

```powershell
New-Item -ItemType Directory -Path "$env:USERPROFILE\source\repos" -Force
Set-Location "$env:USERPROFILE\source\repos"
```

## 3. Pobranie projektu

```powershell
git clone https://github.com/Wiktor-0/quizforge.git
cd quizforge
```

Repozytorium jest prywatne, dlatego GitHub może poprosić o zalogowanie w przeglądarce.

## 4. Instalacja zależności

```powershell
composer install
```

## 5. Utworzenie konfiguracji

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

Otwórz `.env` i upewnij się, że znajduje się tam:

```text
DB_CONNECTION=sqlite
```

Ustawienia MySQL powinny być usunięte albo zakomentowane:

```text
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

Szczególnie ważne jest, aby nie pozostawić aktywnego:

```text
DB_DATABASE=laravel
```

## 6. Utworzenie SQLite

```powershell
if (-not (Test-Path database\database.sqlite)) {
    New-Item database\database.sqlite -ItemType File
}
```

## 7. Utworzenie tabel i przykładowych danych

```powershell
php artisan migrate --seed
```

Polecenie:

- tworzy wszystkie tabele;
- uruchamia migracje;
- dodaje przykładowe quizy, pytania i odpowiedzi.

## 8. Uruchomienie testów

```powershell
php artisan test
```

## 9. Uruchomienie aplikacji

```powershell
php artisan serve
```

Aplikacja będzie dostępna pod adresem:

```text
http://127.0.0.1:8000
```

Serwer można zatrzymać skrótem:

```text
Ctrl+C
```

---

# Instalacja na Debianie

Zalecany jest Debian 13, ponieważ projekt wymaga PHP 8.3 lub nowszego.

## 1. Instalacja wymaganych programów

Zaktualizuj listę pakietów:

```bash
sudo apt update
```

Zainstaluj Git, PHP, Composer i rozszerzenia PHP:

```bash
sudo apt install -y \
    git \
    curl \
    unzip \
    composer \
    php-cli \
    php-curl \
    php-mbstring \
    php-sqlite3 \
    php-xml \
    php-zip
```

Sprawdź instalację:

```bash
git --version
php --version
composer --version
```

Jeżeli polecenie `sudo` nie jest dostępne, przejdź na konto administratora:

```bash
su -
```

Następnie wykonaj:

```bash
apt update
```

```bash
apt install -y \
    git \
    curl \
    unzip \
    composer \
    php-cli \
    php-curl \
    php-mbstring \
    php-sqlite3 \
    php-xml \
    php-zip
```

Wróć na zwykłe konto:

```bash
exit
```

Odśwież dostępne polecenia:

```bash
hash -r
```

## 2. Przygotowanie katalogu

```bash
mkdir -p ~/source/repos
cd ~/source/repos
```

## 3. Pobranie projektu

```bash
git clone https://github.com/Wiktor-0/quizforge.git
cd quizforge
```

Repozytorium jest prywatne. GitHub wymaga uwierzytelnienia za pomocą tokenu dostępu albo klucza SSH.

## 4. Instalacja zależności

```bash
composer install
```

## 5. Utworzenie konfiguracji

```bash
cp .env.example .env
php artisan key:generate
```

W `.env` ustaw:

```text
DB_CONNECTION=sqlite
```

Ustawienia MySQL powinny być usunięte albo zakomentowane.

## 6. Utworzenie pliku SQLite

```bash
touch database/database.sqlite
```

## 7. Utworzenie tabel i przykładowych danych

```bash
php artisan migrate --seed
```

## 8. Uruchomienie testów

```bash
php artisan test
```

## 9. Uruchomienie aplikacji

```bash
php artisan serve
```

Aplikacja będzie dostępna pod adresem:

```text
http://127.0.0.1:8000
```

---

# Aktualizacja istniejącej instalacji

Jeżeli projekt został już wcześniej sklonowany, pobierz zmiany:

```bash
git pull
```

Zainstaluj aktualne zależności:

```bash
composer install
```

Uruchom nowe migracje:

```bash
php artisan migrate
```

Uruchom testy:

```bash
php artisan test
```

Uruchom aplikację:

```bash
php artisan serve
```

Podczas zwykłej aktualizacji nie trzeba wykonywać `--seed`, ponieważ seeder ponownie utworzyłby przykładowe dane quizów.

Jeżeli chcesz celowo odtworzyć przykładowe quizy:

```bash
php artisan db:seed --class=QuizSeeder
```

---

# Podstawowe trasy

| Metoda | Adres | Nazwa | Opis |
|---|---|---|---|
| GET | `/` | `home` | Strona główna |
| GET | `/o-projekcie` | `about` | Informacje o projekcie |
| GET | `/quizy` | `quizzes.index` | Lista quizów |
| GET | `/quizy/{id}` | `quizzes.show` | Szczegóły quizu |
| GET | `/quizy/{id}/start` | `quizzes.start` | Formularz quizu |
| POST | `/quizy/{id}/wynik` | `quizzes.submit` | Walidacja i obliczenie wyniku |
| GET | `/zasady` | `rules.show` | Zasady quizu |
| POST | `/zasady/akceptuj` | `rules.accept` | Zapisanie zgody w sesji |

## Middleware

Trasy:

```text
/quizy/{id}/start
/quizy/{id}/wynik
```

są chronione przez:

```text
EnsureQuizRulesAccepted
```

Jeżeli użytkownik nie zaakceptował zasad:

1. próbuje rozpocząć quiz;
2. middleware sprawdza sesję;
3. użytkownik zostaje przekierowany na `/zasady`;
4. po akceptacji wraca do wcześniej wybranego quizu.

---

# Modele Eloquent

## Quiz

Pola:

- `title`;
- `description`;
- `difficulty`;
- `is_published`.

Relacja:

```php
$quiz->questions
```

## Question

Pola:

- `quiz_id`;
- `content`;
- `points`.

Relacje:

```php
$question->quiz
$question->answers
```

## Answer

Pola:

- `question_id`;
- `content`;
- `is_correct`.

Relacja:

```php
$answer->question
```

---

# Formularz i walidacja

Formularz przesyła odpowiedzi w postaci:

```text
answers[ID_PYTANIA] = ID_ODPOWIEDZI
```

Przykład:

```text
answers[1] = 2
answers[2] = 5
answers[3] = 8
```

Walidacja sprawdza:

- czy przesłano tablicę odpowiedzi;
- czy udzielono odpowiedzi na wszystkie pytania;
- czy ID odpowiedzi jest liczbą;
- czy odpowiedź istnieje w bazie;
- czy odpowiedź należy do właściwego pytania.

Po poprawnej walidacji aplikacja:

1. pobiera zaznaczone odpowiedzi;
2. sprawdza pole `is_correct`;
3. oblicza liczbę punktów;
4. oblicza wynik procentowy;
5. wyświetla podsumowanie odpowiedzi.

---

# Przydatne polecenia

## Uruchomienie serwera

```bash
php artisan serve
```

## Lista tras

```bash
php artisan route:list
```

## Tylko trasy quizów

```bash
php artisan route:list --path=quizy
```

## Uruchomienie testów

```bash
php artisan test
```

## Uruchomienie migracji

```bash
php artisan migrate
```

## Migracje z przykładowymi danymi

```bash
php artisan migrate --seed
```

## Ponowne uruchomienie seedera

```bash
php artisan db:seed --class=QuizSeeder
```

## Sprawdzenie liczby rekordów

```bash
php artisan tinker --execute="dump(App\Models\Quiz::count(), App\Models\Question::count(), App\Models\Answer::count());"
```

Oczekiwany wynik:

```text
3
9
27
```

## Czyszczenie pamięci podręcznej

```bash
php artisan optimize:clear
```

---

# Git

## Sprawdzenie zmian

```bash
git status
```

## Dodanie zmian

```bash
git add .
```

## Utworzenie commita

```bash
git commit -m "Opis zmian po polsku"
```

## Wysłanie zmian

```bash
git push
```

## Pobranie zmian

```bash
git pull
```

## Historia commitów

```bash
git log --oneline --decorate -10
```

## Sprawdzenie różnic

```bash
git diff
```

## Sprawdzenie błędów formatowania

```bash
git diff --check
```

Ostrzeżenia o zmianie `CRLF` na `LF` są normalne na Windowsie.

---

# Najważniejsze katalogi

```text
app/
├── Http/
│   ├── Controllers/
│   │   └── QuizController.php
│   ├── Middleware/
│   │   └── EnsureQuizRulesAccepted.php
│   └── Requests/
│       └── SubmitQuizRequest.php
└── Models/
    ├── Quiz.php
    ├── Question.php
    └── Answer.php

database/
├── migrations/
└── seeders/
    ├── DatabaseSeeder.php
    └── QuizSeeder.php

resources/
└── views/
    ├── layouts/
    │   └── app.blade.php
    └── quizzes/
        ├── index.blade.php
        ├── show.blade.php
        ├── start.blade.php
        └── result.blade.php

public/
└── css/
    └── app.css

routes/
└── web.php
```

---

# Pliki lokalne

Następujące elementy nie są przechowywane w repozytorium:

```text
.env
vendor/
node_modules/
database/database.sqlite
```

Każdy komputer tworzy je lokalnie.

Struktura bazy jest odtwarzana przez migracje, a przykładowe dane przez seeder.

---

# Kolejne możliwe etapy rozwoju

- konta użytkowników;
- zapisywanie historii wyników;
- ranking najlepszych wyników;
- kategorie quizów;
- panel tworzenia i edytowania quizów;
- losowanie pytań;
- limit czasu;
- różne liczby punktów za pytania;
- publikowanie i ukrywanie quizów;
- panel administratora.