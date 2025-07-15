{{-- HANYA daftar menu – tidak ada <aside> lagi --}}
<div class="space-y-4">

  <!-- ===== DASHBOARD ===== -->
  <a href="{{ route('admin.dashboard') }}"
     class="group flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
            {{ request()->routeIs('admin.dashboard')
                 ? 'bg-green-50 text-green-600'
                 : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
    <svg class="w-5 h-5
               {{ request()->routeIs('admin.dashboard')
                    ? 'text-green-600'
                    : 'text-gray-400 group-hover:text-green-500' }}"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6a2 2 0 01-2 2H10a2 2 0 01-2-2V5z"/>
    </svg>
    <span class="font-medium">Dashboard</span>
  </a>

  <!-- ===== KELOLA PENGGUNA ===== -->
  <a href="{{ route('admin.users.index') }}"
     class="group flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
            {{ request()->routeIs('admin.users.*')
                 ? 'bg-blue-50 text-blue-600'
                 : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
    <svg class="w-5 h-5
               {{ request()->routeIs('admin.users.*')
                    ? 'text-blue-600'
                    : 'text-gray-400 group-hover:text-blue-500' }}"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
    </svg>
    <span class="font-medium">Kelola Pengguna</span>
  </a>

  <!-- ===== KELOLA ARSIP ===== -->
<a href="{{ route('admin.arsip.index') }}"
   class="group flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
          {{ request()->routeIs('admin.arsip.*')
               ? 'bg-purple-50 text-purple-600'
               : 'text-gray-700 hover:bg-purple-50 hover:text-purple-600' }}">
  <svg class="w-5 h-5
             {{ request()->routeIs('admin.arsip.*')
                  ? 'text-purple-600'
                  : 'text-gray-400 group-hover:text-purple-500' }}"
       fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 4h16v4H4V4zm0 6h16v10H4V10zm8 4h4m-4 4h4"/>
  </svg>
  <span class="font-medium">Kelola Arsip</span>
</a>

  <!-- ===== PEMBATAS ===== -->
  <hr class="border-gray-200" />

  <!-- ===== LOGOUT ===== -->
  <form action="{{ route('logout') }}" method="POST" class="w-full">
    @csrf
    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin logout?')"
            class="group w-full flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
                   text-gray-700 hover:bg-red-50 hover:text-red-600">
      <svg class="w-5 h-5 text-gray-400 group-hover:text-red-500"
           fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 16l4-4m0 0l-4-4m4 4H7m10.5 0V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2h7.5"/>
      </svg>
      <span class="font-medium">Logout</span>
    </button>
  </form>

  <!-- ===== INFO USER (tetap di footer layout, bukan di sini) ===== -->
  {{-- Footer user info sudah ditangani di layouts.app --}}
</div>
