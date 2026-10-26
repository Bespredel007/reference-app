@extends('layouts.app')

@section('title', 'Топ спеціалістів')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/specialists.css') }}">

    <div class="form-container top-container">
        <h1>Топ спеціалістів за популярністю</h1>

        <table class="top-specialists-table">
            <thead>
            <tr>
                <th class="rank-col">Місце</th>
                <th class="name-col">Ім'я спеціаліста</th>
                <th class="views-col">Переглядів</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($topSpecialists as $index => $specialist)
                <tr>
                    <td class="text-center">
                        <strong>{{ $index + 1 }}</strong>
                    </td>
                    <td>
                        <a href="{{ route('specialists.show', $specialist->id) }}" class="action-link font-bold">
                            {{ $specialist->name }}
                        </a>
                    </td>
                    <td class="text-center">
                            <span class="views-badge">
                                {{ $specialist->views_count }}
                            </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="empty-cell">Даних про відвідування ще немає.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <a href="{{ route('specialists.index') }}" class="back-link">
            « Повернутися до списку
        </a>
    </div>
@endsection
