# QuizForge

QuizForge to prosta aplikacja quizowa tworzona w Laravelu jako projekt zaliczeniowy. Projekt jest rozwijany etapami wraz z kolejnymi zadaniami.

## Zaimplementowane funkcje

- podstawowy routing aplikacji;
- nazwane trasy;
- dynamiczny parametr identyfikatora quizu;
- widoki Blade i wspólny układ stron;
- kontroler `QuizController`;
- własny middleware;
- akceptowanie zasad przed rozpoczęciem quizu;
- przechowywanie zgody w sesji.

## Wymagane oprogramowanie

Do uruchomienia projektu na Windows potrzebne są:

- [Git](https://git-scm.com/download/win)
- [Laravel Herd](https://herd.laravel.com/windows)
- [Visual Studio Code](https://code.visualstudio.com/)

Laravel Herd dostarcza PHP oraz Composer potrzebne do działania aplikacji.

Po instalacji należy uruchomić ponownie terminal lub VS Code i sprawdzić dostępność narzędzi:

```powershell
git --version
php --version
composer --version
```

## Instalacja projektu

# Instalacja na Debianie

Projekt wymaga PHP 8.3 lub nowszego. Zalecany jest Debian 13.

## 1. Instalacja wymaganych programów

Sprawdź dostępne narzędzia:

```bash
git --version
php --version
composer --version
```

Komunikat `nie znaleziono polecenia` oznacza, że dany program nie jest jeszcze zainstalowany.

### Instalacja z użyciem sudo

Zaktualizuj listę pakietów:

```bash
sudo apt update
```

Zainstaluj Git, PHP, Composer i rozszerzenia wymagane przez Laravel:

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

### Instalacja, gdy polecenie sudo nie jest dostępne

Przejdź na konto administratora:

```bash
su -
```

Podaj hasło administratora, a następnie wykonaj:

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

Odśwież listę dostępnych poleceń:

```bash
hash -r
```

Sprawdź instalację:

```bash
git --version
php --version
composer --version
```

PHP musi mieć wersję `8.3` lub nowszą.

Debian 12 domyślnie udostępnia PHP 8.2, które jest za stare dla tego projektu. Zalecane jest użycie Debiana 13.

## 2. Pobranie projektu

```bash
mkdir -p ~/source/repos
cd ~/source/repos
git clone https://github.com/Wiktor-0/quizforge.git
cd quizforge
```

Repozytorium jest prywatne, dlatego GitHub poprosi o uwierzytelnienie. GitHub nie przyjmuje hasła do konta jako hasła Git — należy użyć tokenu dostępu lub skonfigurowanego klucza SSH.

## 3. Instalacja zależności projektu

```bash
composer install
```

## 4. Przygotowanie konfiguracji

```bash
cp .env.example .env
php artisan key:generate
```

Sprawdź, czy plik `.env` zawiera:

```text
DB_CONNECTION=sqlite
```

## 5. Przygotowanie SQLite

```bash
touch database/database.sqlite
php artisan migrate
```

## 6. Uruchomienie testów

```bash
php artisan test
```

## 7. Uruchomienie aplikacji

```bash
php artisan serve
```

Aplikacja będzie dostępna pod adresem:

```text
http://127.0.0.1:8000
```

Serwer można zatrzymać skrótem `Ctrl+C`.

### WINDOWS
### 1. Przygotowanie katalogu

```powershell
New-Item -ItemType Directory -Path "$env:USERPROFILE\source\repos" -Force
Set-Location "$env:USERPROFILE\source\repos"
```

### 2. Sklonowanie repozytorium

```powershell
git clone https://github.com/Wiktor-0/quizforge.git
cd quizforge
```

Repozytorium jest prywatne, dlatego GitHub może poprosić o zalogowanie w przeglądarce.

### 3. Instalacja zależności PHP

```powershell
composer install
```

### 4. Przygotowanie konfiguracji

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

Projekt korzysta z SQLite. W pliku `.env` powinno znajdować się:

```text
DB_CONNECTION=sqlite
```

### 5. Przygotowanie bazy danych

```powershell
New-Item database\database.sqlite -ItemType File -Force
php artisan migrate
```

### 6. Uruchomienie testów

```powershell
php artisan test
```

### 7. Uruchomienie aplikacji

```powershell
php artisan serve
```

Aplikacja będzie dostępna pod adresem:

```text
http://127.0.0.1:8000
```

Serwer można zatrzymać skrótem `Ctrl+C`.

## Aktualizacja istniejącej kopii

Jeżeli projekt jest już sklonowany na komputerze, najnowsze zmiany można pobrać poleceniami:

```powershell
git pull
composer install
php artisan migrate
php artisan test
```

Następnie aplikację można uruchomić:

```powershell
php artisan serve
```

## Podstawowe trasy

| Metoda | Adres | Opis |
|---|---|---|
| GET | `/` | Strona główna |
| GET | `/o-projekcie` | Informacje o projekcie |
| GET | `/quizy` | Lista quizów |
| GET | `/quizy/{id}` | Szczegóły wybranego quizu |
| GET | `/quizy/{id}/start` | Rozpoczęcie quizu |
| GET | `/zasady` | Zasady quizu |
| POST | `/zasady/akceptuj` | Zapisanie akceptacji zasad |

Trasa rozpoczynania quizu jest chroniona przez własny middleware. Użytkownik, który nie zaakceptował zasad, zostaje przekierowany na stronę `/zasady`.

## Pliki lokalne

Następujące elementy nie są przechowywane w repozytorium:

- `.env`;
- `vendor`;
- `node_modules`;
- `database/database.sqlite`.

Są one tworzone lub instalowane osobno na każdym komputerze.