@extends('layouts.app')
@section('title', 'Довідник країн')
@section('content')

    <style>

        body {
            background-color: #1e1e1e;
            color: #e0e0e0;
            font-family: sans-serif;
        }

        .main-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            background-color: #2b2b2b;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
        }

        /* Додати країну */
        .add-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #4da6ff;
            color: #1e1e1e;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .add-btn:hover {
            background-color: #3388dd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #444;
        }

        th {
            background-color: #333;
            color: #fff;
            font-weight: bold;
        }

        tr:hover {
            background-color: #3a3a3a;
        }

        a.action-link {
            color: #4da6ff;
            text-decoration: none;
        }

        a.action-link:hover {
            text-decoration: underline;
        }


        /* Квадратики */
        nav[role="navigation"] {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }


        nav[role="navigation"] > .flex.justify-between {
            display: none;
        }

        /*  блок з номерами сторінок */
        nav[role="navigation"] > div.hidden {
            display: flex !important;
            flex-direction: column;
            align-items: center;
        }

        /* квадратики з номерами */
        nav[role="navigation"] span.relative.inline-flex.items-center,
        nav[role="navigation"] a.relative.inline-flex.items-center {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 40px;
            height: 40px;
            margin: 0 4px;
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.2s;
        }

        nav[role="navigation"] a.relative.inline-flex.items-center:hover {
            background-color: #555;
        }

        /* квадратик зараз */
        nav[role="navigation"] span[aria-current="page"] > span {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 40px;
            height: 40px;
            margin: 0 4px;
            background-color: #4da6ff;
            color: #1e1e1e;
            border: 1px solid #4da6ff;
            border-radius: 6px;
            font-weight: bold;
        }

        /* Прихов. текст " */
        nav[role="navigation"] p.text-sm.text-gray-700 {
            display: none;
        }

        /*  стрілочки  */
        nav svg {
            width: 20px;
            height: 20px;
        }
    </style>

    <div class="main-container">
        <h1>Довідник країн</h1>

        <div style="text-align: center;">
            <a href="{{ route('country.create') }}" class="add-btn">
                Додати країну
            </a>
        </div>

        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Код</th>
                <th>Назва</th>
                <th>Населення</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($countries as $i => $country)
                <tr>
                    <td>{{ $countries->firstItem() + $i }}</td>
                    <td>{{ $country->code }}</td>
                    <td>
                        <a href="{{ route('country.show', $country) }}" class="action-link">
                            {{ $country->name }}
                        </a>
                    </td>
                    <td>{{ number_format($country->population, 0, ',', ' ') }}</td>
                    <td>
                        <a href="{{ route('country.edit', $country) }}" class="action-link">
                            Редагувати
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Блок пагінації -->
        {{ $countries->links() }}
    </div>

@endsection
