@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-6">Aktivitas Pengguna</h1>

        {{-- Filter atau Pencarian jika dibutuhkan --}}
        <form method="GET" action="{{ route('users.aktivitas.index') }}" class="mb-4">
            <div class="flex items-center gap-2">
                <input type="text" name="search" placeholder="Cari aktivitas..."
                    class="border px-3 py-2 rounded w-full lg:w-1/3 shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                    value="{{ request('search') }}">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Cari</button>
            </div>
        </form>

        {{-- Tabel Aktivitas --}}
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full table-auto border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">No</th>
                        <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">Tanggal</th>
                        <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">Deskripsi</th>
                        <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">IP Address</th>
                        <th class="px-4 py-3 border text-left text-sm font-medium text-gray-700">Browser</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($aktivitas as $index => $log)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 border">{{ $log->created_at->format('d M Y H:i') }}</td>
                            <td class="px-4 py-3 border">{{ $log->deskripsi }}</td>
                            <td class="px-4 py-3 border">{{ $log->ip_address }}</td>
                            <td class="px-4 py-3 border">{{ $log->user_agent }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center px-4 py-3 border text-gray-500">Belum ada aktivitas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination jika ada --}}
        <div class="mt-4">
            {{ $aktivitas->links() }}
        </div>
    </div>
@endsection
