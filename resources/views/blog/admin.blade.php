@extends('layouts.app')
@section('title', 'Адміністрування блогу')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">

    <div class="content-container">
        <h1 class="blog-page-title">Адміністрування блогу</h1>
        <p class="flex-center">
            <a href="{{ route('blog.create') }}" class="action-link">Додати запис</a>
        </p>
        <table class="blog-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Заголовок</th>
                <th>Категорія</th>
                <th>Дата</th>
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
                    <td>{{ $blog->category?->category_name ?? '' }}</td>
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
                    <td colspan="5">Записів немає.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="flex-center">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
