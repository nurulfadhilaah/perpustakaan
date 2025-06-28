<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan Daerah Mandailing Natal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
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
        <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-10 h-10">
        <span class="text-lg font-semibold">Perpustakaan Daerah Mandailing Natal</span>
      </div>

      <div class="md:hidden">
        <button onclick="toggleMenu()" class="focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

      <nav class="hidden md:flex space-x-4 text-sm items-center">
        <a href="/" class="hover:text-yellow-300">Beranda</a>
        <a href="/katalog" class="hover:text-yellow-300">Katalog Buku</a>
        <a href="/tentang" class="hover:text-yellow-300">Tentang</a>
        <a href="/kontak" class="hover:text-yellow-300">Kontak</a>
        <a href="/login" class="bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Login</a>
        <a href="/register" class="bg-white text-green-900 border border-yellow-400 px-3 py-1 rounded hover:bg-yellow-100">Register</a>
      </nav>
    </div>

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
      <h1 data-aos="zoom-in" data-aos-duration="1200" class="text-3xl md:text-5xl font-bold mb-4">
        Selamat Datang di Perpustakaan Daerah Mandailing Natal
      </h1>
      <p data-aos="fade-up" data-aos-delay="300" class="text-lg md:text-xl">
        Pusat Informasi dan Literasi untuk Masyarakat Madina
      </p>
      <div data-aos="fade-up" data-aos-delay="500" class="mt-8">
        <a href="/katalog" class="bg-yellow-400 text-green-900 font-semibold px-6 py-3 rounded hover:bg-yellow-500 transition">
          Lihat Katalog Buku
        </a>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-16 bg-gray-50 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 text-center">
      <div data-aos="fade-up" class="bg-white p-6 rounded shadow hover:shadow-md">
        <img src="{{ asset('images/books.png') }}" alt="Koleksi Buku" class="w-28 h-28 object-cover mx-auto mb-4 rounded-md">
        <h3 class="text-xl font-semibold mb-2">Koleksi Buku Lengkap</h3>
        <p class="text-sm text-gray-600">Berbagai jenis buku tersedia dari fiksi hingga referensi pendidikan.</p>
      </div>
      <div data-aos="fade-up" data-aos-delay="150" class="bg-white p-6 rounded shadow hover:shadow-md">
        <img src="{{ asset('images/global.png') }}" alt="Akses Mudah" class="w-28 h-28 object-cover mx-auto mb-4 rounded-md">
        <h3 class="text-xl font-semibold mb-2">Akses Mudah</h3>
        <p class="text-sm text-gray-600">Lihat katalog dan ajukan pinjam buku dari rumah secara online.</p>
      </div>
      <div data-aos="fade-up" data-aos-delay="300" class="bg-white p-6 rounded shadow hover:shadow-md">
        <img src="{{ asset('images/group-users.png') }}" alt="Untuk Semua" class="w-28 h-28 object-cover mx-auto mb-4 rounded-md">
        <h3 class="text-xl font-semibold mb-2">Untuk Semua</h3>
        <p class="text-sm text-gray-600">Terbuka bagi pelajar, mahasiswa, dan masyarakat umum.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-green-900 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">

      <div data-aos="fade-right">
        <div class="flex items-center space-x-3 mb-4">
          <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-10 h-10">
          <h4 class="text-lg font-semibold">Perpustakaan Mandailing Natal</h4>
        </div>
        <p class="text-gray-300 leading-relaxed">
          Menyediakan layanan literasi dan informasi untuk masyarakat Madina melalui koleksi buku dan sistem digital yang mudah diakses.
        </p>
      </div>

      <div data-aos="fade-up">
        <h4 class="text-lg font-semibold mb-3">Navigasi</h4>
        <ul class="space-y-2 text-gray-300">
          <li><a href="/" class="hover:text-yellow-300 transition">Beranda</a></li>
          <li><a href="/katalog" class="hover:text-yellow-300 transition">Katalog Buku</a></li>
          <li><a href="/tentang" class="hover:text-yellow-300 transition">Tentang Kami</a></li>
          <li><a href="/kontak" class="hover:text-yellow-300 transition">Kontak</a></li>
        </ul>
      </div>

      <div data-aos="fade-left">
        <h4 class="text-lg font-semibold mb-3">Kontak</h4>
        <ul class="text-gray-300 space-y-2">
          <li>Jl. Merdeka No. 2 Kel. Kayu Jati, Panyabungan, Mandailing Natal</li>
          <li>Email: <a href="mailto:disperpus@mail.madina.go.id" class="hover:underline text-yellow-300">disperpus@mail.madina.go.id</a></li>
          <li>Telepon: (0636) 321824</li>
        </ul>
        <div class="mt-4">
          <h5 class="text-sm font-semibold mb-2">Ikuti Kami</h5>
          <div class="flex space-x-4">
            <a href="https://www.facebook.com/people/Disperpusip-Kab-Madina/pfbid02gL7QDb3PXJB92fsge8ycW47Vof6KmEFP5iUTVoqvpgAdjQ3Kkq8mp71MSmm6CMbCl/?rdid=h95HDdQt8VpkvYL0&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1FKGMEc7i2%2F" target="_blank" class="hover:text-yellow-400">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.2 3-3.2.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2V12h2.5l-.4 3h-2.1v7A10 10 0 0 0 22 12z"/></svg>
            </a>
            <a href="https://www.instagram.com/disperpusipkabmadina/" target="_blank" class="hover:text-yellow-400">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm4.5-2a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg>
            </a>
          </div>
        </div>
      </div>

    </div>

    <div class="border-t border-green-700 mt-6 py-4 text-center text-xs text-gray-400">
      &copy; 2025 Perpustakaan Daerah Mandailing Natal. Semua hak dilindungi.
    </div>
  </footer>

  <!-- AOS Script -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
