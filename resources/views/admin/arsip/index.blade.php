@extends('layouts.app')

@section('title', 'Kelola Arsip')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-lg p-6 mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">
                    <i class="fas fa-archive mr-2"></i>
                    Kelola Arsip
                </h1>
                <p class="text-blue-100">Kelola dan organisir arsip dokumen dengan mudah</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-2">
                <a href="{{ route('admin.arsip.create') }}"
                   class="inline-flex items-center justify-center bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 transition-colors font-medium shadow-md">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Arsip
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards (Optional) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-center">
                <div class="bg-blue-100 rounded-full p-3">
                    <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Total Arsip</p>
                    <p class="text-2xl font-semibold text-gray-800">{{ $arsips->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Card -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Mobile Search/Filter Bar -->
        <div class="p-4 bg-gray-50 border-b lg:hidden">
            <div class="flex flex-col sm:flex-row gap-2">
                <input type="text" placeholder="Cari arsip..." 
                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <select class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Semua Kategori</option>
                </select>
            </div>
        </div>

        <!-- Desktop Table View -->
        <div class="hidden lg:block overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diunggah Oleh</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Download</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($arsips as $arsip)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $arsip->judul }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($arsip->deskripsi ?? '', 50) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $arsip->kategori->nama_kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $arsip->user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('admin.arsip.show', $arsip->id) }}"
                                   class="inline-flex items-center text-blue-600 hover:text-blue-900 hover:underline">
                                    <i class="fas fa-eye mr-1"></i>
                                    Lihat File
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ asset('storage/' . $arsip->file_path) }}"
                                   download
                                   class="inline-flex items-center text-green-600 hover:text-green-900 hover:underline">
                                    <i class="fas fa-download mr-1"></i>
                                    Unduh
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                <a href="{{ route('admin.arsip.edit', $arsip->id) }}"
                                   class="inline-flex items-center text-blue-600 hover:text-blue-900 hover:underline">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit
                                </a>
                                <form action="{{ route('admin.arsip.destroy', $arsip->id) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Yakin ingin menghapus arsip ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-900 hover:underline">
                                        <i class="fas fa-trash mr-1"></i>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                                    <p class="text-gray-500 text-lg mb-2">Belum ada arsip</p>
                                    <p class="text-gray-400 text-sm">Mulai dengan menambahkan arsip pertama Anda</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="lg:hidden">
            @forelse ($arsips as $arsip)
                <div class="p-4 border-b border-gray-200 last:border-b-0">
                    <div class="flex items-start justify-between mb-2">
                        <h3 class="text-lg font-semibold text-gray-900 pr-2">{{ $arsip->judul }}</h3>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 whitespace-nowrap">
                            {{ $arsip->kategori->nama_kategori }}
                        </span>
                    </div>
                    
                    <div class="text-sm text-gray-600 mb-3">
                        <p><i class="fas fa-user mr-1"></i> {{ $arsip->user->name }}</p>
                        @if($arsip->deskripsi)
                            <p class="mt-1">{{ Str::limit($arsip->deskripsi, 100) }}</p>
                        @endif
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.arsip.show', $arsip->id) }}"
                           class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm hover:bg-blue-200 transition-colors">
                            <i class="fas fa-eye mr-1"></i>
                            Lihat
                        </a>
                        <a href="{{ asset('storage/' . $arsip->file_path) }}"
                           download
                           class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm hover:bg-green-200 transition-colors">
                            <i class="fas fa-download mr-1"></i>
                            Unduh
                        </a>
                        <a href="{{ route('admin.arsip.edit', $arsip->id) }}"
                           class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm hover:bg-yellow-200 transition-colors">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </a>
                        <form action="{{ route('admin.arsip.destroy', $arsip->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus arsip ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm hover:bg-red-200 transition-colors">
                                <i class="fas fa-trash mr-1"></i>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center">
                    <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg mb-2">Belum ada arsip</p>
                    <p class="text-gray-400 text-sm mb-4">Mulai dengan menambahkan arsip pertama Anda</p>
                    <a href="{{ route('admin.arsip.create') }}"
                       class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Arsip
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Pagination (if using pagination) -->
    @if(method_exists($arsips, 'links'))
        <div class="mt-6">
            {{ $arsips->links() }}
        </div>
    @endif
</div>

@push('styles')
<style>
    /* Custom scrollbar untuk table horizontal */
    .overflow-x-auto::-webkit-scrollbar {
        height: 8px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Animation untuk hover effects */
    .transition-colors {
        transition: all 0.3s ease;
    }

    /* Responsive table shadows */
    @media (max-width: 1024px) {
        .overflow-x-auto {
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Simple search functionality (if needed)
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[placeholder="Cari arsip..."]');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                // Add search functionality here
                console.log('Searching for:', this.value);
            });
        }
    });
</script>
@endpush
@endsection