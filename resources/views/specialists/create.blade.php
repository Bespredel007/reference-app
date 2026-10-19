@extends('layouts.app')
@section('title', 'Додати спеціаліста')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/specialists.css') }}">

    <div class="form-container">
        <h1>Додати спеціаліста</h1>

        <form method="POST" action="{{ route('specialists.store') }}">
            @csrf
            @include('specialists._form')

            <button type="submit" class="submit-btn">
                Зберегти
            </button>
        </form>

        <a href="{{ route('specialists.index') }}" class="back-link">
            « Повернутися до списку
        </a>
    </div>
@endsection
