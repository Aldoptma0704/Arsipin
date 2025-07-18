<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Arsipin</title>

  {{-- Tailwind CDN (production sebaiknya via Laravel Mix/Vite) --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary:  '#3B82F6',
            secondary:'#64748B',
            green: {
              50 : '#f0fdf4',
              100: '#dcfce7',
              500: '#22c55e',
              600: '#16a34a',
              700: '#15803d'
            }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-50 min-h-screen">

  {{-- Tombol hamburger (muncul hanya di mobile) --}}
  <button id="mobileMenuBtn"
          class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-lg bg-white shadow-lg border border-gray-200 hover:bg-gray-50 transition-colors">
    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </button>

  {{-- Overlay gelap di belakang sidebar (mobile) --}}
  <div id="mobileOverlay"
       class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden"></div>

  {{-- ===== WRAPPER FLEX (desktop) ===== --}}
  <div class="lg:flex min-h-screen">

    {{-- ========== SIDEBAR ========== --}}
    <aside id="sidebar"
      class="
        flex-shrink-0 w-64 bg-white shadow-lg border-r overflow-y-auto
        lg:static lg:translate-x-0 lg:transform-none    {{-- desktop: kolom biasa --}}
        fixed inset-y-0 left-0 z-40 transform -translate-x-full        {{-- mobile: drawer --}}
        transition-transform duration-300 ease-in-out
      ">

      {{-- Header --}}
      <div class="flex items-center justify-between p-4 border-b border-gray-200">
        <div class="flex items-center">
          <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center mr-3">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          <h1 class="text-xl font-bold text-gray-800">Arsipin</h1>
        </div>

        <button id="closeSidebarBtn"
                class="lg:hidden p-1 rounded-lg hover:bg-gray-100 transition-colors">
          <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- Menu --}}
      <nav class="flex-1 p-4">
        @if(auth()->user()->role === 'admin')
          @include('partials.sidebar-admin')
        @elseif(auth()->user()->role === 'user')
          @include('partials.sidebar-user')
        @endif
      </nav>

      {{-- Footer --}}
      <div class="p-4 border-t border-gray-200">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
              @if(auth()->user()->foto && file_exists(public_path('storage/' . auth()->user()->foto)))
                <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                    alt="Foto Profil"
                    class="w-8 h-8 rounded-full object-cover mr-3 border border-gray-300">
              @else
                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3">
                  <span class="text-white text-sm font-medium">
                    {{ strtoupper(Str::substr(auth()->user()->name,0,1)) }}
                  </span>
                </div>
              @endif
            <div>
              <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
              <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
            </div>
          </div>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="p-2 text-gray-400 hover:text-red-500 transition-colors"
                    title="Logout">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7" />
              </svg>
            </button>
          </form>
        </div>
      </div>
    </aside>
    {{-- ========== /SIDEBAR ========== --}}

    {{-- ========== MAIN CONTENT ========== --}}
    <main class="flex-1 h-screen overflow-y-auto p-4 sm:p-6 lg:p-8">
      {{-- Judul di mobile (supaya tetap terlihat) --}}
      <header class="lg:hidden mb-4">
        <h1 class="text-lg font-semibold text-gray-800">Dashboard</h1>
      </header>

      @yield('content')
    </main>
    {{-- ========== /MAIN ========== --}}
  </div>

  {{-- ===== SCRIPTS ===== --}}
  <script>
    const mobileMenuBtn   = document.getElementById('mobileMenuBtn');
    const closeSidebarBtn = document.getElementById('closeSidebarBtn');
    const sidebar         = document.getElementById('sidebar');
    const mobileOverlay   = document.getElementById('mobileOverlay');

    function openSidebar(){
      sidebar.classList.remove('-translate-x-full');
      mobileOverlay.classList.remove('hidden');
    }
    function closeSidebar(){
      sidebar.classList.add('-translate-x-full');
      mobileOverlay.classList.add('hidden');
    }

    mobileMenuBtn .addEventListener('click', openSidebar);
    closeSidebarBtn.addEventListener('click', closeSidebar);
    mobileOverlay  .addEventListener('click', closeSidebar);

    /* Tutup drawer otomatis jika resize ke desktop */
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024) closeSidebar();
    });
  </script>
</body>
</html>
