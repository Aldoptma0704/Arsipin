@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Selamat Datang di Dashboard Arsipin</h1>
    <p class="mt-2">Kamu sudah berhasil login!</p>
    <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline mt-4 inline-block">
    Kelola Pengguna
    </a>

    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
    </form>
@endsection
