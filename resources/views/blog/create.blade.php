@extends('layouts.app')

@section('title', 'Створити запис')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">

    <div class="content-container text-center">
        <h1 class="blog-page-title">Створення нового запису</h1>

        <form action="{{ route('blog.store') }}" method="POST">
            @include('blog._form')
            <button type="submit" class="action-link">Зберегти</button>
        </form>
    </div>
@endsection
