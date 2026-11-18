@extends('layouts.app')

@section('title', 'Редагування абонемента')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subscriptions.css') }}">

    <div class="content-container subscriptions-container">
        <div class="flex-center subscriptions-header">
            <h1 class="blog-page-title">Редагування абонемента</h1>
            <a href="{{ route('subscriptions.show', $subscription) }}" class="btn-secondary-custom">← Назад</a>
        </div>

        <div class="subscription-form-card">
            <form action="{{ route('subscriptions.update', $subscription) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group-custom">
                    <label for="title" class="form-label-custom">Назва абонемента:</label>
                    <input type="text" name="title" id="title" class="form-input-custom" value="{{ old('title', $subscription->title) }}" required>
                    @error('title')
                    <p class="form-error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group-custom">
                    <label for="price" class="form-label-custom">Ціна (грн):</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-input-custom" value="{{ old('price', $subscription->price) }}" required>
                    @error('price')
                    <p class="form-error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group-custom">
                    <label for="description" class="form-label-custom">Опис абонемента:</label>
                    <textarea name="description" id="description" class="form-input-custom form-textarea-custom">{{ old('description', $subscription->description) }}</textarea>
                    @error('description')
                    <p class="form-error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group-custom">
                    <label for="tags" class="form-label-custom">Включені послуги / Теги:</label>
                    <select name="tags[]" id="tags" class="form-input-custom select2" multiple>
                        @foreach($tags as $id => $name)
                            <option value="{{ $id }}" {{ in_array($id, old('tags', $selected ?? [])) ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                    <p class="form-error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="subscription-actions">
                    <button type="submit" class="btn-primary">Оновити абонемент</button>
                </div>
            </form>
        </div>
    </div>
@endsection
