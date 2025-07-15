<!-- Sidebar User -->
<aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-40 w-64 bg-white shadow-lg border-r border-gray-200 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <!-- Sidebar Header -->
    <div class="flex items-center justify-between p-4 border-b border-gray-200">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h1 class="text-xl font-bold text-gray-800">Arsipin</h1>
        </div>
        <button id="closeSidebarBtn" class="lg:hidden p-1 rounded-lg hover:bg-gray-100 transition-colors">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto p-4">
        <div class="space-y-2">
            <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Menu Utama</h2>
            
            <!-- Dashboard -->
            <a href="{{ route('user.dashboard') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors group {{ request()->routeIs('user.dashboard') ? 'bg-green-50 text-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                </svg>
                Dashboard
            </a>
            <!-- Arsip Saya -->
            <a href="{{ route('user.arsip.index') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors group {{ request()->routeIs('user.arsip.*') ? 'bg-green-50 text-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Arsip Saya
            </a>
            <!-- Tambah Arsip -->
            <a href="{{ route('user.arsip.create') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors group {{ request()->routeIs('user.arsip.create') ? 'bg-green-50 text-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Arsip
            </a>
            <!-- Cari Arsip -->
            <a href="{{ route('user.arsip.search') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors group {{ request()->routeIs('user.arsip.search') ? 'bg-green-50 text-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Cari Arsip
            </a>
            <!-- Kategori -->
            <a href="{{ route('user.kategori.index') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors group {{ request()->routeIs('user.kategori.*') ? 'bg-green-50 text-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
                Kategori
            </a>
        </div>
        
        <!-- Divider -->
        <div class="border-t border-gray-200 my-4"></div>
        
        <!-- Statistik Section -->
        <div class="space-y-2">
            <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Statistik</h2>
            
            <!-- Laporan -->
            <a href="{{ route('user.laporan.index') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors group {{ request()->routeIs('user.laporan.*') ? 'bg-green-50 text-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                Laporan
            </a>
            
            <!-- Aktivitas -->
            <a href="{{ route('user.aktivitas.index') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors group {{ request()->routeIs('user.aktivitas.*') ? 'bg-green-50 text-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Aktivitas Terbaru
            </a>
        </div>
        
        <!-- Divider -->
        <div class="border-t border-gray-200 my-4"></div>
        
        <!-- Pengaturan Section -->
        <div class="space-y-2">
            <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Pengaturan</h2>
            
            <!-- Profil -->
            <a href="{{ route('user.profil.index') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors group {{ request()->routeIs('user.profil.*') ? 'bg-green-50 text-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Profil Saya
            </a>
            
            <!-- Pengaturan -->
            <a href="{{ route('user.pengaturan.index') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors group {{ request()->routeIs('user.pengaturan.*') ? 'bg-green-50 text-green-600' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Pengaturan
            </a>
        </div>
    </nav>
    
    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-gray-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gray-400 rounded-full flex items-center justify-center mr-3">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="p-2 text-gray-400 hover:text-red-500 transition-colors" title="Logout">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>

<!-- Overlay for mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden hidden"></div>

<script>
// Mobile sidebar toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const closeSidebarBtn = document.getElementById('closeSidebarBtn');
    const openSidebarBtn = document.getElementById('openSidebarBtn'); // Assuming you have this button in your main layout
    
    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }
    
    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
    
    // Close sidebar when clicking close button
    if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', closeSidebar);
    }
    
    // Open sidebar when clicking open button (you need to add this button to your main layout)
    if (openSidebarBtn) {
        openSidebarBtn.addEventListener('click', openSidebar);
    }
    
    // Close sidebar when clicking overlay
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }
    
    // Close sidebar when pressing Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSidebar();
        }
    });
});
</script>