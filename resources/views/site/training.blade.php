@extends('layouts.app')

@section('title', 'Запис на тренування')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/training.css') }}">
@endpush

@section('content')
    <div class="training-wrapper">
        <div class="training-card">

            <h1 class="training-title">{{ $clubTitle }}</h1>
            <p class="training-subtitle">Залиште заявку на персональне тренування чи консультування</p>

            <form method="POST" action="{{ route('training.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Ім'я користувача:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
                    @error('name')
                    <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control">
                    @error('email')
                    <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group form-group--last">
                    <label for="message" class="form-label">Текст повідомлення:</label>
                    <textarea id="message" name="message" rows="4" class="form-control">{{ old('message') }}</textarea>
                    @error('message')
                    <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date" class="form-label">Дата тренування:</label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}" class="form-control">
                    @error('date')
                    <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn-submit">
                    Надіслати заявку
                </button>
            </form>

        </div>
    </div>
@endsection
