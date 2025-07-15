@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard</h1>
    <p>Halo, {{ auth()->user()->name }}. Kamu login sebagai <strong>{{ auth()->user()->role }}</strong>.</p>

    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
            Logout
        </button>
    </form>
@endsection
