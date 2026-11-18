@extends('layouts.app')
@section('title', $blog->title)
@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">

    <div class="content-container">
        <div class="back-link-container">
            <a href="{{ route('blog.index') }}" class="action-link">&leftarrow; Назад до блогу</a>
        </div>

        <article class="blog-card blog-card-single">
            <div class="blog-card-body">
                <span class="blog-category">
                    {{ $blog->category?->category_name ?? 'Без категорії' }}
                </span>

                <h1 class="blog-page-title blog-single-title">{{ $blog->title }}</h1>

                <p class="blog-meta">
                    Автор: {{ $blog->author?->name ?? 'Редакція' }} &middot;
                    {{ $blog->dt_created ? $blog->dt_created->format('d.m.Y H:i') : '' }}
                </p>

                @if($blog->description)
                    <p class="blog-lead-description">
                        {{ $blog->description }}
                    </p>
                @endif

                <div class="blog-text">
                    <p>{{ $blog->text }}</p>
                </div>

                <div class="tags-container">
                    @forelse ($blog->filters as $filter)
                        <span class="tag-item">{{ $filter->filter_name }}</span>
                    @empty
                        <span>Міток немає.</span>
                    @endforelse
                </div>

                <div class="actions-container">
                    <a href="{{ route('blog.tags', $blog) }}" class="btn-primary">Редагувати мітки </a>
                    <a href="{{ route('blog.edit', $blog) }}" class="btn-primary">Редагувати запис </a>
                </div>
            </div>
        </article>
    </div>
@endsection
