@extends('layouts.app')

@section('title', 'Форма введення даних')

@section('content')
    <div style="max-width: 500px; margin: 40px auto; text-align: center;">
        <h1>Форма введення даних</h1>

        <form method="POST" action="{{ route('entry.store') }}" style="text-align: left; display: inline-block; width: 100%;">
            @csrf
            <div>
                <label for="name">Ім'я:</label><br>
                <input type="text" id="name" name="name" value="{{ old('name') }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
                @error('name')
                <p style="color: red; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <br>

            <div>
                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 8px; box-sizing: border-box;">
                @error('email')
                <p style="color: red; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <br>

            <div style="text-align: center;">
                <button type="submit" style="padding: 10px 20px; cursor: pointer;">Надіслати</button>
            </div>
        </form>
    </div>
@endsection
