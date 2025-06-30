<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak - Perpustakaan Daerah Mandailing Natal</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logomadina2.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
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
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
               xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
      <nav class="hidden md:flex space-x-4 text-sm items-center">
        <a href="/" class="hover:text-yellow-300">Beranda</a>
        <a href="/katalog" class="hover:text-yellow-300">Katalog Buku</a>
        <a href="/tentang" class="hover:text-yellow-300">Tentang</a>
        <a href="/kontak" class="hover:text-yellow-300 font-bold underline">Kontak</a>
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
        <a href="/kontak" class="block hover:text-yellow-300 font-bold underline">Kontak</a>
        <a href="/login" class="block bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Login</a>
        <a href="/register" class="block bg-white text-green-900 border border-yellow-400 px-3 py-1 rounded hover:bg-yellow-100">Register</a>
      </nav>
    </div>
  </header>

  <!-- Kontak Hero -->
   <section class="bg-gradient-to-r from-green-800 to-green-600 text-white py-16 px-4">
    <div class="max-w-4xl mx-auto text-center">
      <h2 data-aos="zoom-in" class="text-3xl md:text-4xl font-bold mb-3">Hubungi Kami</h2>
      <p data-aos="fade-up" data-aos-delay="200" class="text-lg">Kami siap membantu Anda. Silakan hubungi kami melalui form atau informasi kontak di bawah ini.</p>
    </div>
  </section>

  <!-- Kontak Form & Info -->
  <section class="py-16 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Form -->
      <div class="bg-white p-6 rounded shadow" data-aos="fade-right">
        <h3 class="text-xl font-semibold mb-4 text-green-900">Formulir Kontak</h3>
        <form action="{{ route('kontak.store') }}" method="POST" class="space-y-4">
        @csrf
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
            <textarea name="pesan" rows="4" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" required></textarea>
          </div>
          <button type="submit" class="bg-green-700 text-white px-5 py-2 rounded hover:bg-green-800">Kirim</button>
          @if(session('success'))
              <div class="mt-4 bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded">
                  {{ session('success') }}
              </div>
          @endif
        </form>
      </div>

      <!-- Info Kontak -->
       <div class="bg-white p-6 rounded shadow" data-aos="fade-left">
        <h3 class="text-xl font-semibold mb-4 text-green-900">Informasi Kontak</h3>
        <ul class="space-y-4 text-sm text-gray-700">
          <li><strong>Alamat:</strong><br> Jl. Merdeka No. 2 Kel. Kayu Jati, Kec. Panyabungan, Kab. Mandailing Natal, Sumatera Utara</li>
          <li><strong>Email:</strong><br> disperpus@mail.madina.go.id</li>
          <li><strong>Telepon:</strong><br> (0636) 321824</li>
          <li><strong>Jam Operasional:</strong><br> Senin - Jumat, 08.00 - 16.00 WIB</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-green-900 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">

      <!-- Kolom Info -->
      <div>
        <div class="flex items-center space-x-3 mb-4">
          <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-10 h-10">
          <h4 class="text-lg font-semibold">Perpustakaan Mandailing Natal</h4>
        </div>
        <p class="text-gray-300 leading-relaxed">
          Menyediakan layanan literasi dan informasi untuk masyarakat Madina melalui koleksi buku dan sistem digital yang mudah diakses.
        </p>
      </div>

      <!-- Navigasi -->
      <div>
        <h4 class="text-lg font-semibold mb-3">Navigasi</h4>
        <ul class="space-y-2 text-gray-300">
          <li><a href="/" class="hover:text-yellow-300 transition">Beranda</a></li>
          <li><a href="/katalog" class="hover:text-yellow-300 transition">Katalog Buku</a></li>
          <li><a href="/tentang" class="hover:text-yellow-300 transition">Tentang Kami</a></li>
          <li><a href="/kontak" class="hover:text-yellow-300 transition">Kontak</a></li>
        </ul>
      </div>

      <!-- Kontak + Sosial Media -->
      <div>
        <h4 class="text-lg font-semibold mb-3">Kontak</h4>
        <ul class="text-gray-300 space-y-2">
          <li>Jl. Merdeka No. 2 Kel. Kayu Jati, Kec. Panyabungan, Mandailing Natal</li>
          <li>Email: <a href="mailto:info@perpustakaanmadina.go.id" class="hover:underline text-yellow-300">disperpus@mail.madina.go.id</a></li>
          <li>Telepon: (0636) 321824</li>
        </ul>

        <!-- Sosial Media -->
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

  <!-- Script AOS -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
      duration: 800
    });
  </script>
</body>
</html>
