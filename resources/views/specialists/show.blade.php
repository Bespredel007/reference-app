@extends('layouts.app')
@section('title', $specialist->name)
@section('content')
    <link rel="stylesheet" href="{{ asset('css/specialists.css') }}">

    <div class="form-container">
        <img src="{{ $specialist->photo ?? 'https://placehold.co/120' }}"
             class="specialist-photo profile-photo"
             alt="{{ $specialist->name }}">

        <h1>{{ $specialist->name }}</h1>

        <div class="specialist-details">
            <p><strong>Спеціальність:</strong> {{ $specialist->specialty }}</p>
            <p><strong>Досвід роботи:</strong> {{ $specialist->experience }} років</p>
            <p><strong>Телефон:</strong> {{ $specialist->phone }}</p>
            <p><strong>Ціна тренування:</strong> {{ $specialist->price }} грн</p>
        </div>

        <a href="{{ route('specialists.edit', $specialist) }}" class="submit-btn btn-block">
            Редагувати дані
        </a>

        <form method="POST" action="{{ route('specialists.destroy', $specialist) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">
                Видалити спеціаліста
            </button>
        </form>

        <a href="{{ route('specialists.index') }}" class="back-link">
            « Повернутися до списку
        </a>
    </div>
@endsection
