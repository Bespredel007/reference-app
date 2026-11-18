@extends('layouts.app')

@section('title', $subscription->title)

@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subscriptions.css') }}">
    <div class="content-container subscriptions-container">
        <div class="subscription-show-card">
            <h1 class="subscription-show-title">{{ $subscription->title }}</h1>
            <div class="subscription-show-price">{{ number_format($subscription->price, 2) }} грн</div>
            @if($subscription->description)
                <p class="subscription-show-desc">{{ $subscription->description }}</p>
            @endif
            <div class="subscription-tags-box">
                <span class="subscription-show-tags-title">Включені зони та послуги:</span>
                <div class="subscription-tags-list">
                    @forelse($subscription->tags as $tag)
                        <span class="tag-item">{{ $tag->name }}</span>
                    @empty
                        <span class="subscription-no-tags">Послуги не вказано</span>
                    @endforelse
                </div>
            </div>
            <div class="actions-container subscription-actions">
                <a href="{{ route('subscriptions.index') }}" class="btn-secondary-custom">← Назад до списку</a>
                <a href="{{ route('subscriptions.edit', $subscription) }}" class="blog-btn">Редагувати</a>
                <form action="{{ route('subscriptions.destroy', $subscription) }}" method="POST" onsubmit="return confirm('Ви дійсно бажаєте видалити цей абонемент?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger-custom">Видалити</button>
                </form>
            </div>
        </div>
    </div>
@endsection
