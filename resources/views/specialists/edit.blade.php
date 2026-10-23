@extends('layouts.app')
@section('title', 'Редагування')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/specialists.css') }}">

    <div class="form-container">
        <h1>Редагувати профіль</h1>

        <form method="POST" action="{{ route('specialists.update', $specialist) }}">
            @csrf
            @method('PUT')

            @include('specialists._form')

            <button type="submit" class="submit-btn">
                Зберегти зміни
            </button>
        </form>

        <form method="POST" action="{{ route('specialists.destroy', $specialist) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn" >
                Видалити спеціаліста
            </button>
        </form>

        <a href="{{ route('specialists.index') }}" class="back-link">
            « Повернутися до списку
        </a>
    </div>
@endsection
