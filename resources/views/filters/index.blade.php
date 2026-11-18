@extends('layouts.app')

@section('title', 'Довідник міток')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/subscriptions.css') }}">

    <div class="content-container subscriptions-container">
        <div class="flex-center subscriptions-header">
            <h1 class="blog-page-title">Довідник міток</h1>
            <a href="{{ route('filters.create') }}" class="action-link add-btn">
                + Додати мітку
            </a>
        </div>

        <div class="blog-grid subscriptions-grid">
            @forelse($filters as $filter)
                <div class="blog-card">
                    <div class="blog-card-body">
                        <h2 class="subscription-title">
                            {{ $filter->filter_name }}
                        </h2>

                        @if($filter->filter_description)
                            <p class="subscription-description">{{ $filter->filter_description }}</p>
                        @endif

                        <div class="actions-container subscription-actions">
                            <a href="{{ route('filters.edit', $filter) }}" class="blog-btn">Редагувати</a>
                            <form action="{{ route('filters.destroy', $filter) }}" method="POST" onsubmit="return confirm('Ви дійсно бажаєте видалити цю мітку?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger-custom">Видалити</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center subscriptions-empty">
                    <p>Міток поки не додано</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
