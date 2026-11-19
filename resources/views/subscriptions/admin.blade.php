@extends('layouts.app')
@section('title', 'Адміністрування абонементів')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subscriptions.css') }}">

    @php
        $currentSort = request('sort');

        $nextTitleSort = $currentSort === 'title' ? '-title' : 'title';
        $nextPriceSort = $currentSort === 'price' ? '-price' : 'price';
        $nextTagsCountSort = $currentSort === 'tags_count' ? '-tags_count' : 'tags_count';
    @endphp

    <div class="content-container subscriptions-container">
        <div class="flex-center subscriptions-header">
            <h1 class="blog-page-title">Адміністрування абонементів</h1>
            <div class="actions-container" style="margin-top: 0;">
                <a href="{{ route('subscriptions.index') }}" class="btn-secondary-custom">Публічний вигляд</a>
                <a href="{{ route('subscriptions.create') }}" class="action-link add-btn" style="margin-right: 0;">+ Додати абонемент</a>
            </div>
        </div>

        <form method="GET" action="{{ route('subscriptions.admin') }}" class="blog-filter-form">
            <div class="filter-group">
                <label for="title">Назва абонемента</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ request('title') }}"
                    placeholder="Пошук за назвою"
                >
            </div>

            <div class="filter-group">
                <label for="tagName">Назва послуги</label>
                <input
                    type="text"
                    id="tagName"
                    name="tagName"
                    value="{{ request('tagName') }}"
                    placeholder="Наприклад: Басейн"
                >
            </div>

            <div class="filter-group">
                <label for="tag_id">Послуга (список)</label>
                <select id="tag_id" name="tag_id" onchange="this.form.submit()">
                    <option value="">Усі послуги</option>
                    @foreach ($tags as $id => $name)
                        <option
                            value="{{ $id }}"
                            @selected(request('tag_id') == $id)
                        >
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="sort" value="{{ request('sort') }}">

            <div class="filter-actions">
                <button type="submit" class="blog-btn">Застосувати</button>
                <a href="{{ route('subscriptions.admin') }}" class="action-link">Скинути</a>
            </div>
        </form>

        <table class="blog-table">
            <thead>
            <tr>
                <th>#</th>
                <th>
                    <a href="{{ route('subscriptions.admin', array_merge(
                        request()->except('sort', 'page'),
                        ['sort' => $nextTitleSort]
                    )) }}">
                        Назва абонемента
                        @if ($currentSort === 'title') ↑ @elseif ($currentSort === '-title') ↓ @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('subscriptions.admin', array_merge(
                        request()->except('sort', 'page'),
                        ['sort' => $nextPriceSort]
                    )) }}">
                        Ціна
                        @if ($currentSort === 'price') ↑ @elseif ($currentSort === '-price') ↓ @endif
                    </a>
                </th>
                <th>Включені послуги</th>
                <th>
                    <a href="{{ route('subscriptions.admin', array_merge(
                        request()->except('sort', 'page'),
                        ['sort' => $nextTagsCountSort]
                    )) }}">
                        К-сть послуг
                        @if ($currentSort === 'tags_count') ↑ @elseif ($currentSort === '-tags_count') ↓ @endif
                    </a>
                </th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($subscriptions as $i => $subscription)
                <tr>
                    <td>{{ $subscriptions->firstItem() + $i }}</td>
                    <td>
                        <a href="{{ route('subscriptions.show', $subscription) }}">
                            {{ $subscription->title }}
                        </a>
                    </td>
                    <td>{{ number_format($subscription->price, 2) }} грн</td>
                    <td>
                        @forelse ($subscription->tags as $tag)
                            <span class="tag">{{ $tag->name }}</span>
                        @empty
                            -
                        @endforelse
                    </td>
                    <td>{{ $subscription->tags_count }}</td>
                    <td>
                        <a href="{{ route('subscriptions.edit', $subscription) }}">Редагувати</a>
                        <form method="POST" action="{{ route('subscriptions.destroy', $subscription) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="blog-btn">Видалити</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Абонементів не знайдено.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="flex-center subscriptions-pagination">
            {{ $subscriptions->links() }}
        </div>
    </div>
@endsection
