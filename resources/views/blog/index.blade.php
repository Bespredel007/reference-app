@extends('layouts.app')
@section('title', 'Список публікацій')
@section('content')
    <nav class="blog-filters">
        <a href="{{ route('blog.index') }}">Усі записи</a>
        @foreach ($filters as $id => $name)
            <a href="{{ route('blog.index', ['filter' => $id]) }}">
                {{ $name }}
            </a>
        @endforeach
    </nav>
    <br>
    @foreach ($blogs as $blog)
        <div class="info">
            <div class="card-text">
                <h2>{{ $blog->title }}</h2>
                <p>{{ $blog->description }}</p>
                <div class="tags">
                    @foreach ($blog->filters as $filter)
                        <span class="tag">{{ $filter->filter_name }}</span>
                    @endforeach
                </div>
                <br>
                <a href="{{ route('blog.show', $blog) }}">Читати далі</a>
            </div>
        </div>
    @endforeach
    {{ $blogs->links() }}
@endsection
