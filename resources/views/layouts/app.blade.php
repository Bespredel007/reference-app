
    <!DOCTYPE html>
    <html lang="uk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Лабораторний практикум')</title>
        <link rel="stylesheet" href="{{ asset('css/aap.blde.css') }}">
        @stack('styles')
    </head>
    <body>
    <nav>
        <div class="nav-left">
            <a href="{{ route('entry.form') }}" class="nav-auth-btn"> Вхід </a>
        </div>
        <a href="{{ route('training.form') }}">Запис</a>
        <a href="">Клуби</a>
        <a href="{{ route('specialists.index') }}">Спеціалісти</a>
        <a href="">Абонементи</a>
        <a href="">Тренування</a>
        <a href="{{ route('site.about') }}">Про нас</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-socials">
            <p style="text-align: center;">Застосунок на основі фреймворку Laravel.</p>
            <p style="text-align: center;">Виконала: Пащенко Ангеліна Сергіївна , група РІ-51.</p>
            <a href="#">Instagram</a> |
            <a href="#">Facebook</a> |
            <a href="#">Telegram</a>
        </div>
        <p>&copy; {{ date('Y') }} КПІ ім. Ігоря Сікорського</p>
    </footer>

    </body>
    </html>
