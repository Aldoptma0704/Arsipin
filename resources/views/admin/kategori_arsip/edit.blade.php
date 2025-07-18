@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-semibold mb-4">Edit Kategori Arsip</h1>

    <form action="{{ route('admin.kategori-arsip.update', $kategori_arsip->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama_kategori" class="block text-gray-700 font-medium mb-1">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori"
                   class="w-full border rounded px-3 py-2"
                   value="{{ $kategori_arsip->nama_kategori }}" required>
        </div>
        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Update</button>
    </form>
</div>
@endsection
