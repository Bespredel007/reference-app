@extends('layouts.app')
@section('title', 'Блог')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <div class="content-container">
        <h1 style="text-align: center; color: #ff4500; margin-bottom: 30px;">Блог</h1>

        <div class="blog-grid">
            @forelse ($blogs as $blog)
                @include('blog._item', ['blog' => $blog])
            @empty
                <p style="text-align: center;">Записів поки немає.</p>
            @endforelse
        </div>

        <div style="display: flex; justify-content: center; margin-top: 30px;">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
