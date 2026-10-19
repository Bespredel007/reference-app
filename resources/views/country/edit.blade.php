@extends('layouts.app')
@section('title', 'Редагування країни')
@section('content')
    <style>
        /* Блок */
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

        /*  поля вводу  */
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
        .delete-btn {
            width: 100%;
            margin-top: 10px;
            padding: 12px;
            background-color: transparent;
            color: #ff4d4d;
            border: 1px solid #ff4d4d;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s;
        }
        /* Посилання для повернення назад */
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
        <h1>Редагування країни</h1>

        <form method="POST" action="{{ route('country.update', $country) }}">
            @csrf
            @method('PUT')
            @include('country._form')

            <button type="submit" class="submit-btn">
                Зберегти зміни
            </button>
        </form>
        <form method="POST" action="{{ route('country.destroy', $country) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn" onclick="return confirm('Ви впевнені, що хочете видалити цю країну?')">
                Видалити країну
            </button>
        </form>
        <a href="{{ route('country.index') }}" class="back-link">
            « Повернутися до списку
        </a>
    </div>



@endsection
