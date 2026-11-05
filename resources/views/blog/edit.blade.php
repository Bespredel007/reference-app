@extends('layouts.app')
@section('title', 'Редагувати запис')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">

    <div class="content-container text-center">
        <h1 class="blog-page-title">Редагування запису</h1>

        <form method="POST" action="{{ route('blog.update', $blog) }}" style="max-width: 600px; margin: 0 auto;">
            @csrf
            @method('PUT')
            @include('blog._form')

            <button type="submit" class="action-link" style="margin-top: 20px;">Оновити запис</button>
        </form>
    </div>
@endsection
