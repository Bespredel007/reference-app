@extends('layouts.app')

@section('title', 'Спеціалісти клубу')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/specialists.css') }}">

    <div class="main-container">
        <h1>Наші Спеціалісти</h1>

        <div>
            <a href="{{ route('specialists.top') }}" class="add-btn">
                Топ спеціалістів
            </a>
        </div>

        <!-- Фільтрація -->
        <div class="filter-container">
            <form action="{{ route('specialists.index') }}" method="GET">
                <label for="specialtyFilter" class="filter-label">Фільтр за спеціальністю:</label>
                <select name="specialty" id="specialtyFilter" class="filter-select" onchange="this.form.submit()">
                    <option value="">Всі спеціалісти</option>
                    <option value="плавання" {{ request('specialty') == 'плавання' ? 'selected' : '' }}>Плавання</option>
                    <option value="тренажерний зал" {{ request('specialty') == 'тренажерний зал' ? 'selected' : '' }}>Тренажерний зал</option>
                    <option value="групові" {{ request('specialty') == 'групові' ? 'selected' : '' }}>Групові тренування</option>
                    <option value="масажист" {{ request('specialty') == 'масажист' ? 'selected' : '' }}>Масажисти</option>
                </select>
            </form>
        </div>
        <table>
            <thead>
            <tr>
                <th>Фото</th>
                <th>Ім'я</th>
                <th>Спеціальність</th>
                <th>Досвід роботи</th>
                <th>Телефон</th>
                <th>Вартість тренування</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($specialists as $spec)
                <tr>
                    <td>
                        <img src="https://placehold.co/80x80/2b2b2b/4da6ff?text={{ mb_substr($spec->name, 0, 2) }}"
                             class="specialist-photo"
                             alt="{{ $spec->name }}">
                    </td>
                    <td>
                        <a href="{{ route('specialists.show', $spec) }}" class="action-link">
                            {{ $spec->name }}
                        </a>
                    </td>
                    <td>{{ $spec->specialty }}</td>
                    <td>{{ $spec->experience }} років</td>
                    <td>{{ $spec->phone }}</td>
                    <td>{{ $spec->price }} грн</td>
                    <td>
                        <a href="{{ route('specialists.edit', $spec) }}" class="action-link">
                            Редагувати
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Пагінація -->
        {{ $specialists->links() }}

        <div class="text-center" style="margin-top: 25px;">
            <a href="{{ route('specialists.create') }}" class="add-btn">
                + Додати спеціаліста
            </a>
        </div>
    </div>
@endsection
