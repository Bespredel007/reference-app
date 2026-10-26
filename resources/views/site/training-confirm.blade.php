@extends('layouts.app')

@section('title', 'Заявку прийнято')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/training.css') }}">
@endpush

@section('content')
    <div class="training-wrapper">
        <div class="training-card training-card--confirm">
            <h1 class="training-title training-title--success">Дякуємо! Заявку успішно прийнято</h1>
            <p class="training-subtitle training-subtitle--confirm">Ми зв'яжемося з вами найближчим часом.</p>

            <div class="confirm-details">
                <p><strong>Ім'я:</strong> {{ $name }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Повідомлення:</strong> {{ $message }}</p>
                <p><strong>Дата тренування:</strong> {{ $date }}</p>
                <p><strong>Час тренування:</strong> {{ $time }}</p>
            </div>

            <a href="{{ route('training.form') }}" class="btn-submit">
                Надіслати ще одну заявку
            </a>
        </div>
    </div>
@endsection
