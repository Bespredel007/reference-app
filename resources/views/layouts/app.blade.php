
    <!DOCTYPE html>
    <html lang="uk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Лабораторний практикум')</title>
        <link rel="stylesheet" href="{{ asset('css/aap.blde.css') }}">
    </head>
    <body>
    <nav>
        <a href="{{ url('/about') }}">Клуби</a>
        <a href="{{ url('/contact') }}">Спеціалісти</a>
        <a href="{{ url('/about') }}">Абонименти</a>
        <a href="{{ url('/about') }}">Тренування</a>
        <a href="{{ url('/about') }}">Про нас</a>
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
