@extends('layouts.app')
@section('title', 'Абонементи')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subscriptions.css') }}">
    <div class="content-container subscriptions-container">
        <div class="flex-center subscriptions-header">
            <h1 class="blog-page-title">Абонементи фітнес-центру</h1>
            <a href="{{ route('subscriptions.create') }}" class="action-link add-btn">
                + Додати абонемент
            </a>
        </div>
        <div class="blog-grid subscriptions-grid">
            @forelse($subscriptions as $subscription)
                <div class="blog-card">
                    <div class="blog-card-body">
                        <span class="blog-category">{{ number_format($subscription->price, 2) }} грн</span>
                        <h2 class="subscription-title">
                            <a href="{{ route('subscriptions.show', $subscription) }}">{{ $subscription->title }}</a>
                        </h2>

                        @if($subscription->description)
                            <p class="subscription-description">{{ $subscription->description }}</p>
                        @endif

                        <div class="subscription-tags-box">
                            <div class="subscription-tags-list">
                                @forelse($subscription->tags as $tag)
                                    <span class="tag-item">{{ $tag->name }}</span>
                                @empty
                                    <span class="subscription-no-tags">Без додаткових послуг</span>
                                @endforelse
                            </div>
                        </div>

                        <div class="actions-container subscription-actions">
                            <a href="{{ route('subscriptions.show', $subscription) }}" class="blog-btn">Переглянути</a>
                            <a href="{{ route('subscriptions.edit', $subscription) }}" class="blog-btn">Редагувати</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center subscriptions-empty">
                    <p>Абонементів поки не додано.</p>
                </div>
            @endforelse
        </div>

        <div class="flex-center subscriptions-pagination">
            {{ $subscriptions->links() }}
        </div>
    </div>
@endsection
