@extends('layouts.app')

@section('title', 'Статистика відвідувань')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">

    <div class="stats-container">
        <h1 class="stats-title">Статистика відвідувань</h1>

        <p class="stats-nav">
            <a href="{{ route('stats.pages', ['type' => 'page']) }}">За сторінками</a> |
            <a href="{{ route('stats.pages', ['type' => 'ip']) }}">За ІР-адресами</a> |
            <a href="{{ route('stats.pages', ['type' => 'search_query']) }}">За параметрами пошуку</a>
        </p>

        <table class="stats-table">
            <thead>
            <tr>
                <th class="text-left">
                    {{ ['page' => 'Сторінка', 'ip' => 'IP-адреса', 'search_query' => 'Параметри пошуку'][$type] ?? 'Значення' }}
                </th>
                <th class="text-center">Звернень</th>
                <th class="text-center">Останній візит</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($rows as $row)
                <tr>
                    <td>
                        <a href="{{ route('stats.detail', ['type' => $type, 'item' => $row->{$type}]) }}">
                            {{ $row->{$type} }}
                        </a>
                    </td>
                    <td class="text-center">{{ $row->hits }}</td>
                    <td class="text-center">{{ $row->last_visit }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="empty-cell">Даних ще немає.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
