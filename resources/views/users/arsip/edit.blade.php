@extends('layouts.app')

@section('title', 'Edit Arsip')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-amber-50 to-orange-100 py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-amber-500 to-orange-600 rounded-full mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                </svg>
            </div>
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">Edit Arsip</h1>
            <p class="text-gray-600 text-sm sm:text-base">Perbarui informasi dokumen arsip Anda</p>
        </div>

        <!-- Current File Info -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 mb-6 p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-semibold text-gray-900">File Saat Ini:</p>
                    <p class="text-sm text-gray-600">{{ $arsip->file_name ?? 'Tidak ada file' }}</p>
                </div>
                @if($arsip->file_path)
                    <div class="flex-shrink-0">
                        <a href="{{ Storage::url($arsip->file_path) }}" target="_blank" class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-blue-600 bg-blue-100 hover:bg-blue-200 transition-colors">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Lihat
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            <div class="p-6 sm:p-8">
                <form action="{{ route('users.arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Judul Arsip -->
                    <div class="space-y-2">
                        <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h4a1 1 0 110 2h-1v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6H3a1 1 0 110-2h4z"></path>
                                </svg>
                                Judul Arsip
                            </span>
                        </label>
                        <input 
                            type="text" 
                            id="judul"
                            name="judul" 
                            value="{{ old('judul', $arsip->judul) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-sm sm:text-base"
                            placeholder="Masukkan judul arsip..."
                            required
                        >
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="space-y-2">
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Deskripsi
                            </span>
                        </label>
                        <textarea 
                            id="deskripsi"
                            name="deskripsi" 
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 resize-none text-sm sm:text-base"
                            placeholder="Masukkan deskripsi arsip (opsional)..."
                        >{{ old('deskripsi', $arsip->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="space-y-2">
                        <label for="kategori_arsip_id" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Kategori
                            </span>
                        </label>
                        <select 
                            id="kategori_arsip_id"
                            name="kategori_arsip_id" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 text-sm sm:text-base bg-white"
                            required
                        >
                            <option value="">Pilih kategori arsip...</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kategori->id == old('kategori_arsip_id', $arsip->kategori_arsip_id) ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_arsip_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- File Upload -->
                    <div class="space-y-2">
                        <label for="file" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                File Baru (Opsional)
                            </span>
                        </label>
                        <div class="relative">
                            <input 
                                type="file" 
                                id="file"
                                name="file" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-200 text-sm sm:text-base file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100"
                            >
                        </div>
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3">
                            <div class="flex items-start">
                                <svg class="w-4 h-4 text-yellow-600 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <p class="text-sm text-yellow-800">
                                    <span class="font-semibold">Catatan:</span> Jika Anda tidak memilih file baru, file yang sudah ada akan tetap digunakan.
                                </p>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Format yang didukung: PDF, DOC, DOCX, JPG, PNG (Max: 10MB)</p>
                        @error('file')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-6">
                        <button 
                            type="submit" 
                            class="w-full sm:w-auto bg-gradient-to-r from-amber-500 to-orange-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-amber-600 hover:to-orange-700 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl"
                        >
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Perubahan
                            </span>
                        </button>
                        <a 
                            href="{{ route('users.arsip.index') }}" 
                            class="w-full sm:w-auto bg-gray-100 text-gray-700 px-8 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200 text-center"
                        >
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </span>
                        </a>
                        <a 
                            href="{{ route('users.arsip.show', $arsip->id) }}" 
                            class="w-full sm:w-auto bg-blue-100 text-blue-700 px-8 py-3 rounded-xl font-semibold hover:bg-blue-200 transition-all duration-200 text-center"
                        >
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Lihat Detail
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Card -->
        <div class="mt-6 bg-amber-50 border border-amber-200 rounded-xl p-4">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-amber-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <p class="text-sm font-semibold text-amber-800 mb-1">Tips Edit Arsip:</p>
                    <ul class="text-sm text-amber-700 space-y-1">
                        <li>• Pastikan perubahan yang dilakukan sudah sesuai dengan kebutuhan</li>
                        <li>• File baru akan menggantikan file lama secara permanen</li>
                        <li>• Periksa kembali kategori setelah melakukan perubahan</li>
                        <li>• Simpan backup file lama jika diperlukan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // File upload preview and validation
    document.getElementById('file').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        if (fileName) {
            const fileExtension = fileName.split('.').pop().toLowerCase();
            const allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'];
            
            if (!allowedExtensions.includes(fileExtension)) {
                alert('Format file tidak didukung. Silakan pilih file dengan format: PDF, DOC, DOCX, JPG, PNG');
                e.target.value = '';
                return;
            }
            
            // Check file size (10MB limit)
            if (e.target.files[0].size > 10 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 10MB');
                e.target.value = '';
                return;
            }
            
            // Show file selected confirmation
            const fileInfo = document.createElement('div');
            fileInfo.className = 'mt-2 text-sm text-green-600';
            fileInfo.innerHTML = `✓ File terpilih: ${fileName}`;
            
            // Remove previous file info
            const existingInfo = e.target.parentNode.querySelector('.file-info');
            if (existingInfo) {
                existingInfo.remove();
            }
            
            fileInfo.classList.add('file-info');
            e.target.parentNode.appendChild(fileInfo);
        }
    });

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const judul = document.getElementById('judul').value.trim();
        const kategori = document.getElementById('kategori_arsip_id').value;
        
        if (!judul) {
            alert('Judul arsip harus diisi');
            e.preventDefault();
            return;
        }
        
        if (!kategori) {
            alert('Kategori harus dipilih');
            e.preventDefault();
            return;
        }
        
        // Confirm file replacement if new file is selected
        const fileInput = document.getElementById('file');
        if (fileInput.files.length > 0) {
            const confirmReplace = confirm('Apakah Anda yakin ingin mengganti file yang sudah ada?');
            if (!confirmReplace) {
                e.preventDefault();
                return;
            }
        }
    });

    // Auto-save draft functionality (optional)
    let saveTimeout;
    const formFields = ['judul', 'deskripsi', 'kategori_arsip_id'];
    
    formFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('input', function() {
                clearTimeout(saveTimeout);
                saveTimeout = setTimeout(() => {
                    // Save draft to localStorage
                    const draftData = {};
                    formFields.forEach(id => {
                        const element = document.getElementById(id);
                        if (element) {
                            draftData[id] = element.value;
                        }
                    });
                    localStorage.setItem('arsip_edit_draft_{{ $arsip->id }}', JSON.stringify(draftData));
                }, 1000);
            });
        }
    });
    
    // Load draft on page load
    window.addEventListener('load', function() {
        const draftData = localStorage.getItem('arsip_edit_draft_{{ $arsip->id }}');
        if (draftData) {
            try {
                const parsed = JSON.parse(draftData);
                Object.keys(parsed).forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field && !field.value) {
                        field.value = parsed[fieldId];
                    }
                });
            } catch (e) {
                console.log('Error loading draft:', e);
            }
        }
    });
    
    // Clear draft on successful submit
    document.querySelector('form').addEventListener('submit', function() {
        localStorage.removeItem('arsip_edit_draft_{{ $arsip->id }}');
    });
</script>
@endpush
@endsection