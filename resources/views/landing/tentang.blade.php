<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang - Perpustakaan Daerah Mandailing Natal</title>
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
        <a href="/tentang" class="hover:text-yellow-300 font-bold underline">Tentang</a>
        <a href="/kontak" class="hover:text-yellow-300">Kontak</a>
        <a href="/login" class="bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Login</a>
        <a href="/register" class="bg-white text-green-900 border border-yellow-400 px-3 py-1 rounded hover:bg-yellow-100">Register</a>
      </nav>
    </div>

    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
      <nav class="space-y-2 text-sm">
        <a href="/" class="block hover:text-yellow-300">Beranda</a>
        <a href="/katalog" class="block hover:text-yellow-300">Katalog Buku</a>
        <a href="/tentang" class="block hover:text-yellow-300 font-bold underline">Tentang</a>
        <a href="/kontak" class="block hover:text-yellow-300">Kontak</a>
        <a href="/login" class="block bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Login</a>
        <a href="/register" class="block bg-white text-green-900 border border-yellow-400 px-3 py-1 rounded hover:bg-yellow-100">Register</a>
      </nav>
    </div>
  </header>

  <!-- Tentang Section -->
  <section class="bg-gradient-to-r from-green-800 to-green-600 text-white py-20 px-4">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-4">Tentang Perpustakaan Mandailing Natal</h2>
      <p class="text-lg md:text-xl">Melayani kebutuhan informasi dan literasi masyarakat Mandailing Natal sejak berdirinya.</p>
    </div>
  </section>

  <section class="py-16 px-4 bg-gray-50">
    <div class="max-w-5xl mx-auto space-y-8 text-justify text-gray-700 text-sm md:text-base">
      <div>
        <h3 class="text-xl font-semibold text-green-900 mb-2">Visi</h3>
        <p>Menjadi pusat informasi dan literasi masyarakat yang modern, inklusif, dan berbasis teknologi untuk mendukung peningkatan kualitas pendidikan dan budaya baca di Kabupaten Mandailing Natal.</p>
      </div>
      <div>
        <h3 class="text-xl font-semibold text-green-900 mb-2">Misi</h3>
        <ul class="list-disc pl-6 space-y-2">
          <li>Menyediakan koleksi buku dan referensi yang berkualitas dan relevan.</li>
          <li>Mendorong minat baca melalui layanan yang ramah dan program literasi.</li>
          <li>Mengembangkan layanan digital untuk kemudahan akses informasi.</li>
          <li>Mendukung kegiatan edukatif dan kebudayaan lokal melalui perpustakaan.</li>
        </ul>
      </div>
      <div>
        <h3 class="text-xl font-semibold text-green-900 mb-2">Sejarah Singkat</h3>
        <p>Perpustakaan Daerah Mandailing Natal berdiri sebagai bagian dari komitmen pemerintah daerah dalam meningkatkan kualitas sumber daya manusia. Dengan koleksi ribuan buku dan fasilitas digital, perpustakaan ini terus bertransformasi menjadi ruang belajar yang menyenangkan bagi semua kalangan.</p>
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
