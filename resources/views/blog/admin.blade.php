@extends('layouts.app')
@section('title', 'Адміністрування блогу')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">

    @php
        $currentSort = request('sort');

        $nextTitleSort = $currentSort === 'title' ? '-title' : 'title';
        $nextCategorySort = $currentSort === 'categoryName' ? '-categoryName' : 'categoryName';
        $nextCreatedSort = $currentSort === 'created' ? '-created' : 'created';
    @endphp

    <div class="content-container">
        <h1 class="blog-page-title">Адміністрування блогу</h1>
        <p class="flex-center">
            <a href="{{ route('blog.create') }}" class="action-link">Додати запис</a>
        </p>

        <form method="GET" action="{{ route('blog.admin') }}" class="blog-filter-form">
            <div class="filter-group">
                <label for="title">Заголовок</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ request('title') }}"
                    placeholder="Пошук за заголовком"
                >
            </div>

            <div class="filter-group">
                <label for="categoryName">Назва категорії</label>
                <input
                    type="text"
                    id="categoryName"
                    name="categoryName"
                    value="{{ request('categoryName') }}"
                    placeholder="Назва категорії"
                >
            </div>

            <div class="filter-group">
                <label for="category_id">Категорія</label>
                <select id="category_id" name="category_id" onchange="this.form.submit()">
                    <option value="">Усі категорії</option>
                    @foreach ($categories as $id => $name)
                        <option
                            value="{{ $id }}"
                            @selected(request('category_id') == $id)
                        >
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="filter-group">
                <label for="filter_id">Мітка</label>
                <select id="filter_id" name="filter_id">
                    <option value="">Усі мітки</option>
                    @foreach ($filters as $id => $name)
                        <option
                            value="{{ $id }}"
                            @selected(request('filter_id') == $id)
                        >
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="sort" value="{{ request('sort') }}">

            <div class="filter-actions">
                <button type="submit" class="blog-btn">Застосувати</button>
                <a href="{{ route('blog.admin') }}" class="action-link">Скинути фільтри</a>
            </div>
        </form>

        <table class="blog-table">
            <thead>
            <tr>
                <th>#</th>
                <th>
                    <a href="{{ route('blog.admin', array_merge(
                        request()->except('sort', 'page'),
                        ['sort' => $nextTitleSort]
                    )) }}">
                        Заголовок
                        @if ($currentSort === 'title')
                            ↑
                        @elseif ($currentSort === '-title')
                            ↓
                        @endif
                    </a>
                </th>
                <th>
                    <a href="{{ route('blog.admin', array_merge(
                        request()->except('sort', 'page'),
                        ['sort' => $nextCategorySort]
                    )) }}">
                        Категорія
                        @if ($currentSort === 'categoryName')
                            ↑
                        @elseif ($currentSort === '-categoryName')
                            ↓
                        @endif
                    </a>
                </th>
                <th>Мітки</th>
                <th>
                    <a href="{{ route('blog.admin', array_merge(
                        request()->except('sort', 'page'),
                        ['sort' => $nextCreatedSort]
                    )) }}">
                        Дата
                        @if ($currentSort === 'created')
                            ↑
                        @elseif ($currentSort === '-created')
                            ↓
                        @endif
                    </a>
                </th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($blogs as $i => $blog)
                <tr>
                    <td>{{ $blogs->firstItem() + $i }}</td>
                    <td>
                        <a href="{{ route('blog.show', $blog) }}">
                            {{ $blog->title }}
                        </a>
                    </td>
                    <td>{{ $blog->category?->category_name ?? '-' }}</td>
                    <td>
                        @forelse ($blog->filters as $filter)
                            <span class="tag">
                                {{ $filter->filter_name }}
                            </span>
                        @empty
                            -
                        @endforelse
                    </td>
                    <td>{{ $blog->dt_created->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ route('blog.edit', $blog) }}">Редагувати</a>
                        <form method="POST" action="{{ route('blog.destroy', $blog) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="blog-btn">Видалити</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Записів немає.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="flex-center">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
