@extends('layouts.app')
@section('title', 'Новини клубу')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <div class="content-container">
        <div style="text-align: right; margin-bottom: 20px;">
            <a href="?lang=uk" class="action-link">UA</a> |
            <a href="?lang=en" class="action-link">EN</a>
        </div>

        <h1 class="blog-page-title">{{ $lang === 'en' ? 'Sports Club News' : 'Новини спортклубу' }}</h1>

        <div class="blog-grid">
            @foreach ($newsList as $item)
                <article class="blog-card">
                    <div class="blog-card-body">
                        <h2>{{ $item->translate('title', $lang) }}</h2>
                        <p>{{ $item->translate('content', $lang) }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
@endsection
