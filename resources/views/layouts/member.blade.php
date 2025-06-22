<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Dashboard Anggota')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Toggle menu on mobile
    function toggleMenu() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    }
  </script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

  <!-- Navbar -->
  <header class="bg-green-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <img src="/logo-madina.png" alt="Logo Madina" class="w-10 h-10">
        <span class="text-lg font-semibold">Perpustakaan Mandailing Natal</span>
      </div>

      <!-- Desktop Nav -->
      <nav class="hidden md:flex space-x-4 text-sm items-center">
        <a href="{{ route('member.dashboard') }}" class="hover:text-yellow-300">Dashboard</a>
        <a href="{{ route('member.profil') }}" class="hover:text-yellow-300">Profil</a>
        <a href="{{ route('member.katalog') }}" class="hover:text-yellow-300">Katalog Buku</a>
        <a href="{{ route('member.riwayat') }}" class="hover:text-yellow-300">Riwayat</a>
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @csrf
          <button type="submit" class="bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Logout</button>
        </form>
      </nav>

      <!-- Hamburger -->
      <div class="md:hidden">
        <button onclick="toggleMenu()">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2 text-sm">
      <a href="{{ route('member.profil') }}" class="block text-white hover:text-yellow-300">Profil</a>
      <a href="{{ route('member.katalog') }}" class="block text-white hover:text-yellow-300">Katalog Buku</a>
      <a href="{{ route('member.riwayat') }}" class="block text-white hover:text-yellow-300">Riwayat</a>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="mt-2 bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Logout</button>
      </form>
    </div>
  </header>

  <!-- Flash Message -->
  <div class="max-w-7xl mx-auto px-4">
    @if(session('success'))
      <div class="bg-green-100 text-green-800 p-3 rounded my-4">
          {{ session('success') }}
      </div>
    @endif

    @if(session('error'))
      <div class="bg-red-100 text-red-800 p-3 rounded my-4">
          {{ session('error') }}
      </div>
    @endif
  </div>

  <!-- Main Content -->
  <main class="flex-grow py-8 px-4">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-green-900 text-white text-center py-4">
    <p>&copy; {{ date('Y') }} Perpustakaan Daerah Mandailing Natal</p>
  </footer>

</body>
</html>
