@extends('layouts.app')
@section('title', $blog->title)

@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">

    <div class="content-container">
        <div class="back-link-container">
            <a href="{{ route('blog.index') }}" class="action-link">← Назад до блогу</a>
        </div>

        <article class="blog-card blog-card-single">
            <div class="blog-card-body">
            <span class="blog-category">
                {{ $blog->category?->category_name ?? 'Без категорії' }}
            </span>

                <h1 class="blog-page-title blog-single-title">{{ $blog->title }}</h1>

                <p class="blog-meta">
                    Автор: {{ $blog->author?->name ?? 'Редакція' }} &middot;
                    {{ $blog->dt_created->format('d.m.Y H:i') }}
                </p>

                @if($blog->description)
                    <p class="blog-lead-description">
                        {{ $blog->description }}
                    </p>
                @endif

                <div class="blog-text">
                    {!! nl2br(e($blog->text)) !!}
                </div>
            </div>
        </article>
    </div>
@endsection
