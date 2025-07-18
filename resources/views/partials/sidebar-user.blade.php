<nav class="flex-1 overflow-y-auto p-4">
    {{-- === Menu Utama === --}}
    <div class="space-y-2">
        <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Menu Utama</h2>

        {{-- Dashboard --}}
        <a href="{{ route('users.dashboard') }}"
           class="flex items-center px-3 py-2 rounded-lg transition-colors group
                  {{ request()->routeIs('users.dashboard') ? 'bg-green-50 text-green-600' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
            <svg class="w-5 h-5 mr-3
                        {{ request()->routeIs('users.dashboard') ? 'text-green-600' : 'text-gray-400 group-hover:text-green-500' }}"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
            </svg>
            Dashboard
        </a>

        {{-- Arsip Saya --}}
        <a href="{{ route('users.arsip.index') }}"
           class="flex items-center px-3 py-2 rounded-lg transition-colors group
                  {{ request()->routeIs('users.arsip.index') ? 'bg-green-50 text-green-600' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
            <svg class="w-5 h-5 mr-3
                        {{ request()->routeIs('users.arsip.index') ? 'text-green-600' : 'text-gray-400 group-hover:text-green-500' }}"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Arsip Saya
        </a>

        {{-- Tambah Arsip --}}
        <a href="{{ route('users.arsip.create') }}"
           class="flex items-center px-3 py-2 rounded-lg transition-colors group
                  {{ request()->routeIs('users.arsip.create') ? 'bg-green-50 text-green-600' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
            <svg class="w-5 h-5 mr-3
                        {{ request()->routeIs('users.arsip.create') ? 'text-green-600' : 'text-gray-400 group-hover:text-green-500' }}"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Tambah Arsip
        </a>

        {{-- Kategori --}}
        <a href="{{ route('users.kategori.index') }}"
           class="flex items-center px-3 py-2 rounded-lg transition-colors group
                  {{ request()->routeIs('users.kategori.index') ? 'bg-green-50 text-green-600' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
            <svg class="w-5 h-5 mr-3
                        {{ request()->routeIs('users.kategori.index') ? 'text-green-600' : 'text-gray-400 group-hover:text-green-500' }}"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            Kategori
        </a>
    </div>

    {{-- Divider --}}
    <div class="border-t border-gray-200 my-4"></div>

    {{-- === Statistik === --}}
    <div class="space-y-2">
        <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Statistik</h2>

        {{-- Laporan --}}
        <a href="{{ route('users.laporan.index') }}"
           class="flex items-center px-3 py-2 rounded-lg transition-colors group
                  {{ request()->routeIs('users.laporan.index') ? 'bg-green-50 text-green-600' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
            <svg class="w-5 h-5 mr-3
                        {{ request()->routeIs('users.laporan.index') ? 'text-green-600' : 'text-gray-400 group-hover:text-green-500' }}"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm6 0V9a2 2 0 012-2h2a2 2 0 012 2v10"/>
            </svg>
            Laporan
        </a>
    </div>

    {{-- Divider --}}
    <div class="border-t border-gray-200 my-4"></div>

    {{-- === Pengaturan === --}}
    <div class="space-y-2">
        <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Pengaturan</h2>

        {{-- Profil --}}
        <a href="{{ route('users.profil.index') }}"
           class="flex items-center px-3 py-2 rounded-lg transition-colors group
                  {{ request()->routeIs('users.profil.index') ? 'bg-green-50 text-green-600' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
            <svg class="w-5 h-5 mr-3
                        {{ request()->routeIs('users.profil.index') ? 'text-green-600' : 'text-gray-400 group-hover:text-green-500' }}"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            Profil Saya
        </a>
    </div>
</nav>
