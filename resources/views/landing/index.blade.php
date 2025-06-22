<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan Daerah Mandailing Natal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function toggleMenu() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    }
  </script>
</head>
<body class="bg-white text-gray-800">
  <!-- Navbar -->
  <header class="bg-green-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <img src="/logo-madina.png" alt="Logo Madina" class="w-10 h-10">
        <span class="text-lg font-semibold">Perpustakaan Mandailing Natal</span>
      </div>

      <!-- Hamburger Menu Button (mobile) -->
      <div class="md:hidden">
        <button onclick="toggleMenu()" class="focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
               xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

      <!-- Menu (desktop) -->
      <nav class="hidden md:flex space-x-4 text-sm items-center">
        <a href="/" class="hover:text-yellow-300">Beranda</a>
        <a href="/katalog" class="hover:text-yellow-300">Katalog Buku</a>
        <a href="/tentang" class="hover:text-yellow-300">Tentang</a>
        <a href="/kontak" class="hover:text-yellow-300">Kontak</a>
        <a href="/login" class="bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Login</a>
        <a href="/register" class="bg-white text-green-900 border border-yellow-400 px-3 py-1 rounded hover:bg-yellow-100">Register</a>
      </nav>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
      <nav class="space-y-2 text-sm">
        <a href="/" class="block hover:text-yellow-300">Beranda</a>
        <a href="/katalog" class="block hover:text-yellow-300">Katalog Buku</a>
        <a href="/tentang" class="block hover:text-yellow-300">Tentang</a>
        <a href="/kontak" class="block hover:text-yellow-300">Kontak</a>
        <a href="/login" class="block bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Login</a>
        <a href="/register" class="block bg-white text-green-900 border border-yellow-400 px-3 py-1 rounded hover:bg-yellow-100">Register</a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-green-800 to-green-600 text-white py-20 px-4">
    <div class="max-w-7xl mx-auto text-center">
      <h1 class="text-3xl md:text-5xl font-bold mb-4">Selamat Datang di Perpustakaan Mandailing Natal</h1>
      <p class="text-lg md:text-xl">Pusat Informasi dan Literasi untuk Masyarakat Madina</p>
      <div class="mt-8">
        <a href="/katalog" class="bg-yellow-400 text-green-900 font-semibold px-6 py-3 rounded hover:bg-yellow-500">Lihat Katalog Buku</a>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-16 bg-gray-50 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-center">
      <div class="bg-white p-6 rounded shadow hover:shadow-md">
        <img src="/img/book.svg" alt="Koleksi Buku" class="w-16 h-16 mx-auto mb-4">
        <h3 class="text-xl font-semibold mb-2">Koleksi Buku Lengkap</h3>
        <p class="text-sm text-gray-600">Berbagai jenis buku tersedia dari fiksi hingga referensi pendidikan.</p>
      </div>
      <div class="bg-white p-6 rounded shadow hover:shadow-md">
        <img src="/img/online.svg" alt="Akses Mudah" class="w-16 h-16 mx-auto mb-4">
        <h3 class="text-xl font-semibold mb-2">Akses Mudah</h3>
        <p class="text-sm text-gray-600">Lihat katalog dan ajukan pinjam buku dari rumah secara online.</p>
      </div>
      <div class="bg-white p-6 rounded shadow hover:shadow-md">
        <img src="/img/community.svg" alt="Untuk Semua" class="w-16 h-16 mx-auto mb-4">
        <h3 class="text-xl font-semibold mb-2">Untuk Semua</h3>
        <p class="text-sm text-gray-600">Terbuka bagi pelajar, mahasiswa, dan masyarakat umum.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-green-900 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <p>&copy; 2025 Perpustakaan Daerah Mandailing Natal. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
