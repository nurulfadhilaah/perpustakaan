<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tentang - Perpustakaan Daerah Mandailing Natal</title>
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
      <h2 data-aos="zoom-in" class="text-3xl md:text-4xl font-bold mb-4">Tentang Perpustakaan Mandailing Natal</h2>
      <p data-aos="fade-up" data-aos-delay="200" class="text-lg md:text-xl">Melayani kebutuhan informasi dan literasi masyarakat Mandailing Natal sejak berdirinya.</p>
    </div>
  </section>

  <!-- Visi Misi dan Sejarah -->
  <section class="py-20 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto space-y-16 text-gray-700">

      <!-- Visi -->
      <div class="bg-white shadow rounded-lg p-6 md:p-10" data-aos="fade-right">
        <h3 class="text-2xl font-semibold text-green-900 mb-4 border-b pb-2">Visi</h3>
        <p class="text-base leading-relaxed">
          Perpustakaan dan kearsipan sebagai sumber ilmu dan informasi yang handal menuju masyarakat Kabupaten Mandailing Natal yang cerdas, berbudaya, dan bermanfaat.
        </p>
      </div>

      <!-- Misi -->
      <div class="bg-white shadow rounded-lg p-6 md:p-10" data-aos="fade-left">
        <h3 class="text-2xl font-semibold text-green-900 mb-4 border-b pb-2">Misi</h3>
        <ul class="list-disc list-inside space-y-2 text-base leading-relaxed">
          <li>Meningkatkan pembinaan dan pembangunan lembaga perpustakaan dan kearsipan.</li>
          <li>Meningkatkan profesionalitas dan kompetensi pengelola perpustakaan dan kearsipan.</li>
          <li>Mengembangkan budaya baca dan arsip.</li>
          <li>Memelihara dan melestarikan hasil karya cipta budaya.</li>
          <li>Meningkatkan kualitas SDM di bidang perpustakaan dan kearsipan.</li>
          <li>Meningkatkan upaya penyelamatan, pelestarian, dan pendayagunaan pustaka dan arsip yang bernilai guna.</li>
          <li>Menyelenggarakan layanan perpustakaan dan kearsipan berbasis teknologi dan informasi.</li>
        </ul>
      </div>

      <!-- Sejarah -->
      <div class="bg-white shadow rounded-lg p-6 md:p-10" data-aos="fade-up">
        <h3 class="text-2xl font-semibold text-green-900 mb-4 border-b pb-2">Sejarah Singkat</h3>
        <p class="text-base leading-relaxed text-justify">
          Kabupaten Mandailing Natal secara resmi terbentuk melalui pemekaran dari Kabupaten Tapanuli Selatan berdasarkan Undang-Undang No. 12 Tahun 1998. Pada awalnya, Dinas Perpustakaan dan Kearsipan merupakan sub bagian dari Bagian Organisasi Sekretariat Daerah Kabupaten Mandailing Natal, yang berdiri pada tahun 2000 melalui Peraturan Daerah No. 1 Tahun 2001.
          <br><br>
          Dengan diterbitkannya Undang-Undang No. 32 Tahun 2004 tentang Pemerintahan Daerah, lembaga ini berubah menjadi Kantor Perpustakaan dan Arsip Daerah, sesuai dengan Perda No. 21 Tahun 2008 dan Perbup No. 39 Tahun 2011 tentang pembentukan organisasi teknis daerah.
          <br><br>
          Terakhir, berdasarkan Peraturan Bupati No. 50 Tahun 2016 tanggal 23 November 2016, struktur organisasi Dinas Perpustakaan dan Kearsipan disesuaikan, yang berlaku efektif sejak Januari 2017 hingga saat ini.
        </p>
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
