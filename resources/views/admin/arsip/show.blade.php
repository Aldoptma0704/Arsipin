@extends('layouts.app')

@section('title', 'Lihat Arsip')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <!-- Header Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $arsip->judul }}</h1>
            <div class="flex items-center space-x-2">
                @php
                    $filePath = $arsip->file_path;
                    $fileUrl = asset('storage/' . $filePath);
                    $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                    $fileSize = file_exists(storage_path('app/public/' . $filePath)) ? 
                        number_format(filesize(storage_path('app/public/' . $filePath)) / 1024 / 1024, 2) : 'N/A';
                @endphp
                
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd"/>
                    </svg>
                    {{ strtoupper($extension) }}
                </span>
                
                @if($fileSize !== 'N/A')
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                        {{ $fileSize }} MB
                    </span>
                @endif
            </div>
        </div>

        <!-- Archive Information Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Deskripsi</h3>
                    <p class="text-gray-800">{{ $arsip->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}</p>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Kategori</h3>
                    <div class="flex items-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" clip-rule="evenodd"/>
                            </svg>
                            {{ $arsip->kategori->nama_kategori }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Diunggah Oleh</h3>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-medium">{{ substr($arsip->user->name, 0, 1) }}</span>
                        </div>
                        <div class="ml-3">
                            <p class="text-gray-800 font-medium">{{ $arsip->user->name }}</p>
                            <p class="text-gray-500 text-sm">{{ $arsip->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2">Informasi File</h3>
                    <div class="text-sm text-gray-700 space-y-1">
                        <p><strong>Nama File:</strong> {{ basename($filePath) }}</p>
                        <p><strong>Ekstensi:</strong> {{ strtoupper($extension) }}</p>
                        @if($fileSize !== 'N/A')
                            <p><strong>Ukuran:</strong> {{ $fileSize }} MB</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- File Preview Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Preview File</h2>
            
            <div class="flex items-center space-x-3">
                <button onclick="toggleFullscreen()" class="text-gray-600 hover:text-gray-800 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 11-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 010-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 012 0v1.586l2.293-2.293a1 1 0 111.414 1.414L6.414 15H8a1 1 0 010 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 010-2h1.586l-2.293-2.293a1 1 0 111.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                </button>
                
                <a href="{{ $fileUrl }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                   download>
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                    Download
                </a>
            </div>
        </div>

        <div id="preview-container" class="relative">
            @if ($extension === 'pdf')
                <div class="bg-gray-100 rounded-lg p-4 mb-4 text-center">
                    <p class="text-sm text-gray-600">
                        <svg class="w-5 h-5 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd"/>
                        </svg>
                        PDF Preview - Gunakan scroll untuk navigasi
                    </p>
                </div>
                <iframe id="pdf-viewer" 
                        src="{{ $fileUrl }}" 
                        width="100%" 
                        height="600px" 
                        class="border rounded-lg shadow-sm">
                </iframe>
                
            @elseif (in_array($extension, ['doc', 'docx', 'xls', 'xlsx']))
                <div class="bg-blue-50 rounded-lg p-4 mb-4 text-center">
                    <p class="text-sm text-blue-700">
                        <svg class="w-5 h-5 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd"/>
                        </svg>
                        Preview menggunakan Google Docs Viewer
                    </p>
                </div>
                <iframe src="https://docs.google.com/gview?url={{ urlencode($fileUrl) }}&embedded=true"
                        width="100%" 
                        height="600px" 
                        frameborder="0"
                        class="border rounded-lg">
                </iframe>
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 mt-4">
                    <p class="text-sm text-yellow-800">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        Jika preview tidak muncul, pastikan file dapat diakses publik atau download langsung.
                    </p>
                </div>
                
            @elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                <div class="bg-green-50 rounded-lg p-4 mb-4 text-center">
                    <p class="text-sm text-green-700">
                        <svg class="w-5 h-5 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                        </svg>
                        Preview Gambar
                    </p>
                </div>
                <div class="text-center">
                    <img src="{{ $fileUrl }}" 
                         alt="Preview: {{ $arsip->judul }}" 
                         class="max-w-full h-auto mx-auto border rounded-lg shadow-sm cursor-pointer hover:shadow-md transition-shadow"
                         onclick="openImageModal(this.src)">
                </div>
                
            @elseif (in_array($extension, ['txt', 'md']))
                <div class="bg-gray-50 rounded-lg p-4 mb-4 text-center">
                    <p class="text-sm text-gray-700">
                        <svg class="w-5 h-5 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd"/>
                        </svg>
                        Text File Preview
                    </p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4 max-h-96 overflow-y-auto">
                    <pre class="text-sm text-gray-800 whitespace-pre-wrap">{{ file_get_contents(storage_path('app/public/' . $filePath)) }}</pre>
                </div>
                
            @else
                <div class="bg-red-50 border border-red-200 rounded-lg p-8 text-center">
                    <svg class="w-12 h-12 text-red-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-red-800 mb-2">Format file tidak didukung untuk preview</h3>
                    <p class="text-red-600 mb-4">File dengan ekstensi .{{ $extension }} tidak dapat ditampilkan secara langsung.</p>
                    <p class="text-sm text-red-500">Silakan gunakan tombol download untuk mengunduh file.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-between bg-white rounded-lg shadow-md p-6">
        <a href="{{ route('admin.arsip.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
            </svg>
            Kembali ke Daftar Arsip
        </a>

        <div class="flex items-center space-x-3">
            @can('update', $arsip)
                <a href="{{ route('admin.arsip.edit', $arsip) }}" 
                   class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                    </svg>
                    Edit
                </a>
            @endcan
            
            <a href="{{ $fileUrl }}" 
               class="inline-flex items-center px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
               download>
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
                Download File
            </a>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center p-4">
    <div class="relative max-w-4xl max-h-full">
        <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
        <img id="modalImage" src="" alt="Full size preview" class="max-w-full max-h-full rounded-lg">
    </div>
</div>

<script>
function toggleFullscreen() {
    const container = document.getElementById('preview-container');
    if (!document.fullscreenElement) {
        container.requestFullscreen().catch(err => {
            console.log('Error attempting to enable fullscreen:', err);
        });
    } else {
        document.exitFullscreen();
    }
}

function openImageModal(src) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    modalImage.src = src;
    modal.classList.remove('hidden');
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
}

// Close modal when clicking outside the image
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});
</script>
@endsection