@extends('layouts.app')

@section('title', 'Detail Arsip')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="mb-6">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-blue-600 transition-colors">Dashboard</a></li>
                <li class="text-gray-400">/</li>
                <li><a href="{{ route('admin.arsip.index') }}" class="text-gray-500 hover:text-blue-600 transition-colors">Arsip</a></li>
                <li class="text-gray-400">/</li>
                <li class="text-gray-900 font-medium">Detail</li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl mb-6 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-3">Detail Arsip</h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Informasi lengkap dan detail dokumen arsip</p>
        </div>

        <!-- Status Badge -->
        <div class="flex justify-center mb-8">
            <span class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                Arsip Aktif
            </span>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Left Column - Main Info -->
            <div class="xl:col-span-2 space-y-8">
                <!-- Document Info Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <h2 class="text-2xl font-bold text-white">Informasi Dokumen</h2>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <!-- Title -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    Judul Arsip
                                </label>
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100 group-hover:shadow-md transition-shadow">
                                    <h3 class="text-xl font-bold text-gray-900 leading-relaxed">{{ $arsip->judul }}</h3>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Deskripsi
                                </label>
                                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border border-green-100 min-h-[120px] group-hover:shadow-md transition-shadow">
                                    @if($arsip->deskripsi)
                                        <p class="text-gray-700 leading-relaxed text-justify">{{ $arsip->deskripsi }}</p>
                                    @else
                                        <div class="flex items-center justify-center h-full">
                                            <p class="text-gray-400 italic flex items-center">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                                </svg>
                                                Tidak ada deskripsi
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    Kategori
                                </label>
                                <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-100 group-hover:shadow-md transition-shadow">
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mr-4 shadow-sm"></div>
                                        <span class="text-gray-900 font-semibold text-lg">{{ $arsip->kategori->nama_kategori }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Uploader -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Diunggah oleh
                                </label>
                                <div class="bg-gradient-to-r from-indigo-50 to-blue-50 rounded-xl p-6 border border-indigo-100 group-hover:shadow-md transition-shadow">
                                    <div class="flex items-center">
                                        <div class="w-14 h-14 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-full flex items-center justify-center mr-4 shadow-lg">
                                            <span class="text-white font-bold text-lg">{{ strtoupper(substr($arsip->user->name, 0, 2)) }}</span>
                                        </div>
                                        <div>
                                            <p class="text-gray-900 font-semibold text-lg">{{ $arsip->user->name }}</p>
                                            <p class="text-gray-500">{{ $arsip->user->email ?? 'Email tidak tersedia' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- File Preview Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            File Arsip
                        </h2>
                    </div>
                    <div class="p-8">
                        @if($arsip->file_path)
                            @php
                                $ext = strtolower(pathinfo($arsip->file_path, PATHINFO_EXTENSION));
                                $fileSize = Storage::exists('public/' . $arsip->file_path) ? Storage::size('public/' . $arsip->file_path) : 0;
                            @endphp

                            {{-- File Preview --}}
                            <div class="mb-8">
                                @if(in_array($ext, ['pdf']))
                                    <div class="bg-gray-50 rounded-2xl p-4 border-2 border-dashed border-gray-200">
                                        <iframe src="{{ asset('storage/' . $arsip->file_path) }}" 
                                                class="w-full h-[600px] rounded-xl shadow-inner" 
                                                frameborder="0">
                                        </iframe>
                                    </div>
                                @elseif(in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                    <div class="bg-gray-50 rounded-2xl p-4 border-2 border-dashed border-gray-200">
                                        <img src="{{ asset('storage/' . $arsip->file_path) }}" 
                                             alt="Preview" 
                                             class="w-full max-h-[600px] object-contain rounded-xl shadow-lg mx-auto">
                                    </div>
                                @else
                                    <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-2xl p-6 text-center">
                                        <svg class="w-16 h-16 text-yellow-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="text-yellow-800 font-semibold text-lg mb-2">Pratinjau Tidak Tersedia</p>
                                        <p class="text-yellow-700">File dengan format <strong>{{ strtoupper($ext) }}</strong> tidak dapat dipratinjau. Silakan unduh untuk melihat file.</p>
                                    </div>
                                @endif
                            </div>

                            {{-- File Information --}}
                            <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl p-6 border border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-6 shadow-lg">
                                            @if(in_array($ext, ['pdf']))
                                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                </svg>
                                            @elseif(in_array($ext, ['jpg', 'jpeg', 'png', 'gif']))
                                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            @else
                                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900 text-lg mb-1">
                                                {{ $arsip->file_name ?? basename($arsip->file_path) }}
                                            </p>
                                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                <span class="bg-gray-200 px-2 py-1 rounded font-medium">{{ strtoupper($ext) }}</span>
                                                <span>{{ number_format($fileSize / 1024, 2) }} KB</span>
                                                <span>{{ $arsip->created_at->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex space-x-3">
                                        <a href="{{ asset('storage/' . $arsip->file_path) }}" target="_blank"
                                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl font-semibold hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Lihat
                                        </a>
                                        <a href="{{ asset('storage/' . $arsip->file_path) }}" download
                                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl font-semibold hover:from-green-600 hover:to-emerald-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            Download
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-16 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                                <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-gray-400 text-xl font-medium">Tidak ada file yang tersedia</p>
                                <p class="text-gray-400 mt-2">File belum diunggah atau telah dihapus</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column - Metadata & Actions -->
            <div class="space-y-8">
                <!-- Metadata Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-5">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Metadata
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            <!-- Created Date -->
                            <div class="flex items-center p-4 bg-blue-50 rounded-xl border border-blue-100">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-blue-600 font-medium">Dibuat</p>
                                    <p class="font-bold text-gray-900">{{ $arsip->created_at->format('d M Y') }}</p>
                                    <p class="text-sm text-gray-500">{{ $arsip->created_at->format('H:i') }} WIB</p>
                                </div>
                            </div>

                            <!-- Updated Date -->
                            <div class="flex items-center p-4 bg-green-50 rounded-xl border border-green-100">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-green-600 font-medium">Diperbarui</p>
                                    <p class="font-bold text-gray-900">{{ $arsip->updated_at->format('d M Y') }}</p>
                                    <p class="text-sm text-gray-500">{{ $arsip->updated_at->format('H:i') }} WIB</p>
                                </div>
                            </div>

                            <!-- File Size -->
                            @if($arsip->file_path && Storage::exists('public/' . $arsip->file_path))
                                <div class="flex items-center p-4 bg-orange-50 rounded-xl border border-orange-100">
                                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-orange-600 font-medium">Ukuran File</p>
                                        <p class="font-bold text-gray-900">{{ number_format(Storage::size('public/' . $arsip->file_path) / 1024, 2) }} KB</p>
                                    </div>
                                </div>
                            @endif

                            <!-- ID -->
                            <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-100">
                                <div class="w-12 h-12 bg-gradient-to-r from-gray-500 to-gray-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 font-medium">ID Arsip</p>
                                    <p class="font-bold text-gray-900">#{{ $arsip->id }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="bg-gradient-to-r from-teal-600 to-cyan-600 px-6 py-5">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Statistik
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                                <div class="text-2xl font-bold text-blue-600">{{ \Carbon\Carbon::parse($arsip->created_at)->diffInDays(now()) }}</div>
                                <div class="text-sm text-blue-500 font-medium">Hari Lalu</div>
                            </div>
                            <div class="text-center p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-100">
                                <div class="text-2xl font-bold text-green-600">{{ optional($arsip->kategori)->arsip->count() ?? 0 }}</div>
                                <div class="text-sm text-green-500 font-medium">Jumlah Arsip</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Access Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                    <div class="bg-gradient-to-r from-rose-600 to-pink-600 px-6 py-5">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Akses Cepat
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <a href="{{ route('admin.arsip.create') }}" 
                               class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-4 py-3 rounded-xl font-semibold hover:from-emerald-600 hover:to-teal-700 transition-all duration-200 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Arsip Baru
                            </a>
                            <a href="{{ route('admin.arsip.index', ['kategori' => $arsip->kategori->id]) }}" 
                               class="w-full bg-gradient-to-r from-violet-500 to-purple-600 text-white px-4 py-3 rounded-xl font-semibold hover:from-violet-600 hover:to-purple-700 transition-all duration-200 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Daftar Arsip Saya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="fixed top-4 right-4 transform translate-x-full transition-transform duration-300 ease-in-out z-50">
    <div class="bg-white rounded-xl shadow-xl border border-gray-200 p-4 flex items-center space-x-3">
        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <div>
            <p class="text-gray-900 font-semibold">Berhasil!</p>
            <p class="text-gray-600 text-sm" id="toast-message">Aksi berhasil dilakukan</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Copy to clipboard function
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            showToast('Link berhasil disalin ke clipboard!', 'success');
        }).catch(function(err) {
            console.error('Error copying text: ', err);
            showToast('Gagal menyalin link', 'error');
        });
    }

    // Print page function
    function printPage() {
        window.print();
    }

    // Share file function
    function shareFile() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $arsip->judul }}',
                text: 'Lihat arsip: {{ $arsip->judul }}',
                url: window.location.href
            }).then(() => {
                showToast('Berhasil membagikan arsip!', 'success');
            }).catch((err) => {
                console.log('Error sharing:', err);
                copyToClipboard(window.location.href);
            });
        } else {
            copyToClipboard(window.location.href);
        }
    }

    // Add to favorites function
    function addToFavorites() {
        // Simulate adding to favorites
        showToast('Arsip berhasil ditambahkan ke favorit!', 'success');
    }

    // Show toast notification
    function showToast(message, type = 'success') {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toast-message');
        const icon = toast.querySelector('svg');
        const iconContainer = toast.querySelector('.w-8');
        
        toastMessage.textContent = message;
        
        // Set icon and color based on type
        if (type === 'success') {
            iconContainer.className = 'w-8 h-8 bg-green-500 rounded-full flex items-center justify-center';
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
        } else if (type === 'error') {
            iconContainer.className = 'w-8 h-8 bg-red-500 rounded-full flex items-center justify-center';
            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
        }
        
        // Show toast
        toast.classList.remove('translate-x-full');
        toast.classList.add('translate-x-0');
        
        // Hide toast after 4 seconds
        setTimeout(() => {
            toast.classList.remove('translate-x-0');
            toast.classList.add('translate-x-full');
        }, 4000);
    }

    // Add smooth scrolling to anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Add enhanced print styles
    const printStyles = `
        @media print {
            body * {
                visibility: hidden;
            }
            .container, .container * {
                visibility: visible;
            }
            .container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .bg-gradient-to-br,
            .bg-gradient-to-r,
            .bg-gradient-to-l {
                background: #f8f9fa !important;
                color: #333 !important;
            }
            .shadow-xl,
            .shadow-lg,
            .shadow-2xl {
                box-shadow: none !important;
                border: 1px solid #dee2e6 !important;
            }
            .rounded-3xl,
            .rounded-2xl,
            .rounded-xl {
                border-radius: 8px !important;
            }
            button,
            .bg-gradient-to-r {
                display: none !important;
            }
            .space-y-8 > div:last-child {
                display: none !important;
            }
            .transform,
            .transition-all,
            .hover\\:shadow-xl {
                transform: none !important;
                transition: none !important;
            }
        }
    `;
    
    const styleSheet = document.createElement('style');
    styleSheet.textContent = printStyles;
    document.head.appendChild(styleSheet);

    // Add loading animation for buttons
    document.querySelectorAll('button, a').forEach(element => {
        element.addEventListener('click', function() {
            if (!this.classList.contains('loading')) {
                this.classList.add('loading');
                setTimeout(() => {
                    this.classList.remove('loading');
                }, 1000);
            }
        });
    });
</script>

<style>
    .loading {
        opacity: 0.7;
        pointer-events: none;
    }
    
    .loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 20px;
        height: 20px;
        margin: -10px 0 0 -10px;
        border: 2px solid transparent;
        border-top: 2px solid #ffffff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    @media (max-width: 768px) {
        .grid.grid-cols-1.xl\\:grid-cols-3 {
            grid-template-columns: 1fr;
        }
        
        .text-4xl.sm\\:text-5xl {
            font-size: 2.5rem;
        }
        
        .p-8 {
            padding: 1.5rem;
        }
        
        .px-8 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
    }
</style>
@endpush
@endsection