<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Anggota</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

  <!-- Navbar -->
  <header class="bg-green-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <div class="flex items-center space-x-3">
        <img src="/logo-madina.png" alt="Logo Madina" class="w-10 h-10">
        <span class="text-lg font-semibold">Dashboard Anggota</span>
      </div>

      <!-- Hamburger Button -->
      <button id="hamburgerBtn" class="md:hidden text-white focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>

      <!-- Navigation Menu -->
      <nav id="navMenu" class="hidden md:flex md:items-center md:space-x-4 text-sm">
        <a href="{{ route('member.profil') }}" class="hover:text-yellow-300 block py-1">Profil</a>
        <a href="{{ route('member.katalog') }}" class="hover:text-yellow-300 block py-1">Katalog Buku</a>
        <a href="{{ route('member.riwayat') }}" class="hover:text-yellow-300 block py-1">Riwayat</a>
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @csrf
          <button type="submit" class="bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Logout</button>
        </form>
      </nav>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="md:hidden hidden px-4 pb-4">
      <a href="{{ route('member.profil') }}" class="block py-2 text-sm hover:text-yellow-300">Profil</a>
      <a href="{{ route('member.katalog') }}" class="block py-2 text-sm hover:text-yellow-300">Katalog Buku</a>
      <a href="{{ route('member.riwayat') }}" class="block py-2 text-sm hover:text-yellow-300">Riwayat</a>
      <form action="{{ route('logout') }}" method="POST" class="mt-2">
        @csrf
        <button type="submit" class="w-full bg-yellow-400 text-green-900 px-4 py-2 rounded hover:bg-yellow-500 text-left">Logout</button>
      </form>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow py-10 px-4">
    <div class="max-w-6xl mx-auto">
      <h1 class="text-xl md:text-2xl font-bold text-green-800 mb-6 text-center md:text-left">
        Selamat datang, {{ Auth::guard('member')->user()->nama_anggota }}!
      </h1>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <!-- Kartu Profil -->
  <div class="bg-white rounded-2xl shadow-md hover:shadow-lg p-6 flex flex-col items-center text-center transition-all duration-300">
    <div class="mb-3 bg-yellow-100 text-yellow-600 p-3 rounded-full">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
    </div>
        <h3 class="text-lg font-bold text-green-800 mb-1">Profil</h3>
        <p class="text-sm text-gray-600 mb-4">Periksa dan perbarui informasi pribadi Anda.</p>
        <a href="{{ route('member.profil') }}" class="inline-block bg-yellow-400 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-yellow-500 transition">Lihat Profil</a>
      </div>

      <!-- Kartu Katalog Buku -->
      <div class="bg-white rounded-2xl shadow-md hover:shadow-lg p-6 flex flex-col items-center text-center transition-all duration-300">
        <div class="mb-3 bg-yellow-100 text-yellow-600 p-3 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
          </svg>
        </div>
        <h3 class="text-lg font-bold text-green-800 mb-1">Katalog Buku</h3>
        <p class="text-sm text-gray-600 mb-4">Lihat koleksi buku yang tersedia untuk dipinjam.</p>
        <a href="{{ route('member.katalog') }}" class="inline-block bg-yellow-400 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-yellow-500 transition">Lihat Katalog</a>
      </div>

      <!-- Kartu Riwayat -->
      <div class="bg-white rounded-2xl shadow-md hover:shadow-lg p-6 flex flex-col items-center text-center transition-all duration-300">
        <div class="mb-3 bg-yellow-100 text-yellow-600 p-3 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-5H3v5a2 2 0 002 2z" />
          </svg>
        </div>
        <h3 class="text-lg font-bold text-green-800 mb-1">Riwayat</h3>
        <p class="text-sm text-gray-600 mb-4">Lihat riwayat peminjaman dan pengembalian Anda.</p>
        <a href="{{ route('member.riwayat') }}" class="inline-block bg-yellow-400 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-yellow-500 transition">Lihat Riwayat</a>
      </div>
    </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-green-900 text-white text-center py-4">
    <p class="text-sm">&copy; 2025 Perpustakaan Daerah Mandailing Natal</p>
  </footer>

  <!-- Script -->
  <script>
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburgerBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
