@extends('layouts.app')
@section('title', 'Користувачі')
@section('content')
    <div style="max-width: 800px; margin: 30px auto; padding: 0 15px;">
        <h1>Користувачі системи</h1>
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead>
            <tr>
                <th>№</th>
                <th>Ім'я</th>
                <th>Email</th>
                <th>Зареєстровано</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($users as $i => $user)
                <tr>
                    <td>{{ $users->firstItem() + $i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d.m.Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Користувачів немає.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div style="margin-top: 15px;">
            {{ $users->links() }}
        </div>
    </div>
@endsection
