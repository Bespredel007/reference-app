 <!DOCTYPE html>
    <html lang="uk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Лабораторний практикум')</title>
        <link rel="stylesheet" href="{{ asset('css/aap.blde.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body>
    <nav>
        <div class="nav-left">
            <div class="nav-left" style="display: flex; align-items: center; gap: 12px;">
                @auth
                    <a href="{{ route('subscriptions.admin') }}" class="nav-auth-btn">Абонементи (адмін)</a>
                    <a href="{{ route('blog.admin') }}" class="nav-auth-btn">Блог (адмін)</a>
                    <a href="{{ route('users.index') }}" class="nav-auth-btn">Користувачі</a>
                    <a href="{{ route('profile.edit') }}" class="nav-auth-btn">Профіль</a>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="nav-auth-btn" style="background: none; border: none; color: inherit; font: inherit; cursor: pointer; padding: 0;">
                            Вийти ({{ auth()->user()->name }})
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="nav-auth-btn">Увійти</a>
                    <a href="{{ route('register') }}" class="nav-auth-btn">Реєстрація</a>
                @endguest
            </div>
        </div>
        <a href="{{ route('training.index') }}">Запис</a>
        <a href="">Клуби</a>
        <a href="{{ route('subscriptions.index') }}">Абонементи</a>
        <a href="{{ route('specialists.index') }}">Спеціалісти</a>
        <a href="{{ route('news.index')}}">Новини</a>
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
            @auth
                <div style="margin-top: 20px; text-align: center;">
                    <a href="{{ route('stats.pages') }}" style="padding: 10px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">Переглянути статистику</a>
                </div>
            @endauth
        </div>
        <p>© {{ date('Y') }} КПІ ім. Ігоря Сікорського</p>
    </footer>

    </body>
    </html>
