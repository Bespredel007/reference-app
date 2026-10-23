@extends('layouts.app')
@section('title', 'Додати країну')
@section('content')

    <style>
        .form-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 30px;
            background-color: #2b2b2b;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        .form-container h1 {
            color: #ffffff;
            margin-bottom: 25px;
        }

        .form-container form > div {
            margin-bottom: 18px;
            text-align: left;
        }

        .form-container label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #ccc;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-container input:focus {
            border-color: #4da6ff;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            margin-top: 10px;
            padding: 12px;
            background-color: #4da6ff;
            color: #1e1e1e;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .submit-btn:hover {
            background-color: #3388dd;
        }

        .form-container a.back-link {
            display: inline-block;
            margin-top: 20px;
            color: #4da6ff;
            text-decoration: none;
            font-size: 14px;
        }

        .form-container a.back-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="form-container">
        <h1>Додати країну</h1>

        <form method="POST" action="{{ route('country.store') }}">
            @csrf

            @include('country._form')

            <button type="submit" class="submit-btn">
                Зберегти
            </button>
        </form>

        <a href="{{ route('country.index') }}" class="back-link">
            « Повернутися до списку
        </a>
    </div>

@endsection
