@extends('layouts.app')

@section('title', 'Детальна статистика')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">

    <div class="stats-container">
        <h1 class="stats-title">Детальна статистика</h1>

        <p class="stats-subtitle">
            Фільтр: <strong>{{ ['page' => 'Сторінка', 'ip' => 'IP-адреса', 'search_query' => 'Параметри пошуку'][$type] ?? $type }}</strong> = <strong>{{ $item }}</strong>
        </p>

        <table class="stats-table">
            <thead>
            <tr>
                <th class="text-left">Сторінка</th>
                <th class="text-center">IP</th>
                <th class="text-center">Параметри пошуку</th>
                <th class="text-center">Статус</th>
                <th class="text-center">Дата і час</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($rows as $row)
                <tr>
                    <td>{{ $row->page }}</td>
                    <td class="text-center">{{ $row->ip }}</td>
                    <td class="text-center">{{ $row->search_query }}</td>
                    <td class="text-center">{{ $row->status }}</td>
                    <td class="text-center">
                        {{ is_string($row->visited_at) ? $row->visited_at : $row->visited_at->format('d.m.Y H:i:s') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="empty-cell">Записів за цим фільтром не знайдено.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="pagination-container">
            {{ $rows->links() }}
        </div>

        <div class="stats-nav">
            <a href="{{ route('stats.pages', ['type' => $type]) }}">← Повернутися до загальної статистики</a>
        </div>
    </div>
@endsection
