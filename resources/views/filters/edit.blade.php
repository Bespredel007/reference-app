@extends('layouts.app')

@section('title', 'Редагування мітки')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subscriptions.css') }}">

    <div class="content-container subscriptions-container">
        <div class="flex-center subscriptions-header">
            <h1 class="blog-page-title">Редагування мітки</h1>
            <a href="{{ route('filters.index') }}" class="btn-secondary-custom">← Назад до списку</a>
        </div>

        <div class="subscription-form-card">
            <form action="{{ route('filters.update', $filter) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group-custom">
                    <label for="filter_name" class="form-label-custom">Назва мітки:</label>
                    <input type="text" name="filter_name" id="filter_name" class="form-input-custom" value="{{ old('filter_name', $filter->filter_name) }}" required>
                    @error('filter_name')
                    <p class="form-error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group-custom">
                    <label for="filter_description" class="form-label-custom">Опис мітки (необов'язково):</label>
                    <textarea name="filter_description" id="filter_description" class="form-input-custom form-textarea-custom">{{ old('filter_description', $filter->filter_description) }}</textarea>
                    @error('filter_description')
                    <p class="form-error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="subscription-actions">
                    <button type="submit" class="btn-primary" style="background-color: #ff4500; border: none; color: white; padding: 10px 20px; border-radius: 6px; cursor: pointer;">Оновити мітку</button>
                </div>
            </form>
        </div>
    </div>
@endsection
