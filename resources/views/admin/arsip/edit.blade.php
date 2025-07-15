@extends('layouts.app')

@section('title', 'Edit Arsip')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
            <h1 class="text-xl md:text-2xl font-bold text-white flex items-center">
                <i class="fas fa-edit mr-3"></i>Edit Arsip
            </h1>
        </div>

        <div class="p-4 md:p-6">
            <!-- Alert Messages -->
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle text-red-400 mr-2"></i>
                        <h4 class="text-red-800 font-medium">Terdapat kesalahan:</h4>
                    </div>
                    <ul class="text-red-700 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-start">
                                <i class="fas fa-dot-circle text-xs mt-1.5 mr-2"></i>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-400 mr-2"></i>
                        <span class="text-green-800">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('admin.arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Grid Layout for larger screens -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Judul -->
                        <div class="form-group">
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-heading text-blue-500 mr-2"></i>
                                Judul <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="judul" id="judul" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('judul') border-red-500 ring-2 ring-red-200 @enderror"
                                   value="{{ old('judul', $arsip->judul) }}" 
                                   placeholder="Masukkan judul arsip..."
                                   required>
                            @error('judul')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="form-group">
                            <label for="kategori_arsip_id" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-folder text-yellow-500 mr-2"></i>
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select name="kategori_arsip_id" id="kategori_arsip_id" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('kategori_arsip_id') border-red-500 ring-2 ring-red-200 @enderror" 
                                    required>
                                <option value="">Pilih Kategori</option>
                                @foreach($kategori as $k)
                                    <option value="{{ $k->id }}" 
                                            {{ old('kategori_arsip_id', $arsip->kategori_arsip_id) == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_arsip_id')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Nomor Arsip -->
                        <div class="form-group">
                            <label for="nomor_arsip" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-hashtag text-purple-500 mr-2"></i>
                                Nomor Arsip
                            </label>
                            <input type="text" name="nomor_arsip" id="nomor_arsip"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('nomor_arsip') border-red-500 ring-2 ring-red-200 @enderror"
                                   value="{{ old('nomor_arsip', $arsip->nomor_arsip) }}"
                                   placeholder="Contoh: ARS/2024/001">
                            @error('nomor_arsip')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Tanggal Arsip -->
                        <div class="form-group">
                            <label for="tanggal_arsip" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-calendar text-green-500 mr-2"></i>
                                Tanggal Arsip
                            </label>
                            <input type="date" name="tanggal_arsip" id="tanggal_arsip"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('tanggal_arsip') border-red-500 ring-2 ring-red-200 @enderror"
                                   value="{{ old('tanggal_arsip', $arsip->tanggal_arsip ? $arsip->tanggal_arsip->format('Y-m-d') : '') }}">
                            @error('tanggal_arsip')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Deskripsi -->
                        <div class="form-group">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-align-left text-indigo-500 mr-2"></i>
                                Deskripsi
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none @error('deskripsi') border-red-500 ring-2 ring-red-200 @enderror"
                                      placeholder="Masukkan deskripsi arsip...">{{ old('deskripsi', $arsip->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- File Upload -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-file-upload text-orange-500 mr-2"></i>
                                File Arsip
                            </label>
                            
                            <!-- Current File Info -->
                            @if($arsip->file_path)
                                <div class="mb-4 p-4 bg-blue-50 rounded-lg border border-blue-200">
                                    <div class="flex items-center justify-between flex-wrap gap-2">
                                        <div class="flex items-center">
                                            <i class="fas fa-file text-blue-500 mr-2"></i>
                                            <span class="text-sm text-gray-700">File saat ini:</span>
                                        </div>
                                        <a href="{{ Storage::url($arsip->file_path) }}" target="_blank" 
                                           class="text-blue-600 hover:text-blue-800 text-sm font-medium hover:underline transition-colors">
                                            {{ basename($arsip->file_path) }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- File Input -->
                            <div class="relative">
                                <input type="file" name="file" id="file-input"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('file') border-red-500 ring-2 ring-red-200 @enderror file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                       accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.xls,.xlsx">
                                <div class="mt-2 text-xs text-gray-500">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Biarkan kosong jika tidak ingin mengganti file. Format: PDF, DOC, DOCX, JPG, PNG, XLS, XLSX (Max: 10MB)
                                </div>
                            </div>
                            
                            <!-- File Preview -->
                            <div id="file-preview" class="hidden mt-3 p-3 bg-green-50 rounded-lg border border-green-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                        <span class="text-sm text-green-700">File baru dipilih:</span>
                                    </div>
                                    <button type="button" id="remove-file" class="text-red-500 hover:text-red-700 text-sm">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div id="file-info" class="mt-1 text-sm text-green-600"></div>
                            </div>
                            
                            @error('file')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-toggle-on text-green-500 mr-2"></i>
                                    <span class="text-sm font-medium text-gray-700">Status Arsip</span>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_active" value="1" 
                                           {{ old('is_active', $arsip->is_active) ? 'checked' : '' }}
                                           class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">Aktif</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                        <button type="submit" 
                                class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg hover:from-green-700 hover:to-green-800 focus:ring-4 focus:ring-green-300 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-save mr-2"></i>
                            <span>Update Arsip</span>
                        </button>
                        
                        <a href="{{ route('admin.arsip.index') }}" 
                           class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-medium rounded-lg hover:from-gray-600 hover:to-gray-700 focus:ring-4 focus:ring-gray-300 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-arrow-left mr-2"></i>
                            <span>Kembali</span>
                        </a>
                        
                        <a href="{{ route('admin.arsip.show', $arsip->id) }}" 
                           class="flex-1 sm:flex-none inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-lg hover:from-blue-600 hover:to-blue-700 focus:ring-4 focus:ring-blue-300 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-eye mr-2"></i>
                            <span>Lihat Detail</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Mobile-friendly file upload with better UX
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('file-input');
        const filePreview = document.getElementById('file-preview');
        const fileInfo = document.getElementById('file-info');
        const removeFileBtn = document.getElementById('remove-file');
        const kategoriSelect = document.getElementById('kategori_arsip_id');
        const nomorArsip = document.getElementById('nomor_arsip');

        // File upload handling
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const fileSize = (file.size / 1024 / 1024).toFixed(2);
                const fileName = file.name;
                const fileType = file.type;
                
                // Show file preview
                filePreview.classList.remove('hidden');
                fileInfo.innerHTML = `
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="font-medium">${fileName}</span>
                            <span class="text-xs text-gray-500 ml-2">(${fileSize} MB)</span>
                        </div>
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">
                            ${getFileIcon(fileType)}
                        </span>
                    </div>
                `;
                
                // Validate file size (10MB max)
                if (file.size > 10 * 1024 * 1024) {
                    showAlert('File terlalu besar! Maksimal 10MB.', 'error');
                    fileInput.value = '';
                    filePreview.classList.add('hidden');
                }
            } else {
                filePreview.classList.add('hidden');
            }
        });

        // Remove file selection
        removeFileBtn.addEventListener('click', function() {
            fileInput.value = '';
            filePreview.classList.add('hidden');
        });

        // Auto-generate nomor arsip
        kategoriSelect.addEventListener('change', function() {
            if (!nomorArsip.value.trim()) {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value) {
                    const kategoriText = selectedOption.text;
                    const year = new Date().getFullYear();
                    const kategoriCode = kategoriText.substring(0, 3).toUpperCase();
                    nomorArsip.value = `${kategoriCode}/${year}/`;
                    nomorArsip.focus();
                }
            }
        });

        // Form validation before submit
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const judul = document.getElementById('judul').value.trim();
            const kategori = kategoriSelect.value;
            
            if (!judul || !kategori) {
                e.preventDefault();
                showAlert('Harap lengkapi semua field yang wajib diisi!', 'error');
                return false;
            }
            
            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
        });
    });

    // Helper functions
    function getFileIcon(fileType) {
        if (fileType.includes('pdf')) return 'PDF';
        if (fileType.includes('word') || fileType.includes('doc')) return 'DOC';
        if (fileType.includes('excel') || fileType.includes('sheet')) return 'XLS';
        if (fileType.includes('image')) return 'IMG';
        return 'FILE';
    }

    function showAlert(message, type) {
        const alertClass = type === 'error' ? 'bg-red-500' : 'bg-green-500';
        const alert = document.createElement('div');
        alert.className = `fixed top-4 right-4 ${alertClass} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300`;
        alert.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-${type === 'error' ? 'exclamation-triangle' : 'check-circle'} mr-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(alert);
        
        setTimeout(() => {
            alert.style.transform = 'translateX(100%)';
            setTimeout(() => alert.remove(), 300);
        }, 3000);
    }

    // Touch-friendly interactions for mobile
    if ('ontouchstart' in window) {
        document.querySelectorAll('button, a').forEach(element => {
            element.style.minHeight = '44px';
            element.style.minWidth = '44px';
        });
    }
</script>
@endpush

@push('styles')
<style>
    /* Custom responsive enhancements */
    @media (max-width: 640px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        .form-group label {
            font-size: 0.875rem;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            font-size: 16px; /* Prevents zoom on iOS */
        }
    }
    
    /* Enhanced focus styles for accessibility */
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }
    
    /* Smooth transitions */
    * {
        transition: all 0.2s ease-in-out;
    }
    
    /* Custom scrollbar for webkit browsers */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
</style>
@endpush
@endsection