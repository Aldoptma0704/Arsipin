@extends('layouts.app')

@section('title', 'Arsip Saya')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 rounded-lg shadow-lg p-6 mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">
                    <i class="fas fa-archive mr-2"></i>
                    Arsip Saya
                </h1>
                <p class="text-green-100">Lihat, kelola, dan unduh arsip pribadi Anda</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-2">
                <a href="{{ route('users.arsip.create') }}"
                   class="inline-flex items-center justify-center bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-green-50 transition-colors font-medium shadow-md">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Arsip
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center">
                <div class="bg-green-100 rounded-full p-3">
                    <i class="fas fa-file-alt text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Total Arsip</p>
                    <p class="text-2xl font-semibold text-gray-800">{{ $totalArsip }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table View -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="hidden lg:block overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">File</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Download</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($arsips as $arsip)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $arsip->judul }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($arsip->deskripsi ?? '', 50) }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $arsip->kategori->nama_kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('users.arsip.show', $arsip->id) }}"
                                   class="text-green-600 hover:underline">
                                   <i class="fas fa-eye mr-1"></i> Lihat
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ asset('storage/' . $arsip->file_path) }}" download
                                   class="text-blue-600 hover:underline">
                                   <i class="fas fa-download mr-1"></i> Unduh
                                </a>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('users.arsip.edit', $arsip->id) }}"
                                   class="text-yellow-600 hover:underline">
                                   <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <form action="{{ route('users.arsip.destroy', $arsip->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus arsip ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i><br>
                                Belum ada arsip. Mulai tambahkan sekarang!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile View -->
        <div class="lg:hidden">
            @forelse ($arsips as $arsip)
                <div class="p-4 border-b">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">{{ $arsip->judul }}</h3>
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">
                            {{ $arsip->kategori->nama_kategori }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">{{ Str::limit($arsip->deskripsi ?? '', 100) }}</p>
                    <div class="mt-3 flex flex-wrap gap-2 text-sm">
                        <a href="{{ route('users.arsip.show', $arsip->id) }}" class="text-green-600 hover:underline">
                            <i class="fas fa-eye mr-1"></i>Lihat
                        </a>
                        <a href="{{ asset('storage/' . $arsip->file_path) }}" download class="text-blue-600 hover:underline">
                            <i class="fas fa-download mr-1"></i>Unduh
                        </a>
                        <a href="{{ route('users.arsip.edit', $arsip->id) }}" class="text-yellow-600 hover:underline">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        <form action="{{ route('users.arsip.destroy', $arsip->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus arsip ini?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">
                                <i class="fas fa-trash mr-1"></i>Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center text-gray-500">
                    <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i><br>
                    Belum ada arsip.<br>
                    <a href="{{ route('users.arsip.create') }}" class="text-green-600 font-medium hover:underline mt-2 inline-block">
                        Tambah Arsip Sekarang
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    @if(method_exists($arsips, 'links'))
        <div class="mt-6">
            {{ $arsips->links() }}
        </div>
    @endif
</div>
@endsection
