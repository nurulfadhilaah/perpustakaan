<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Anggota</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logomadina2.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

  <!-- Navbar -->
  <header class="bg-green-900 text-white shadow-md" data-aos="fade-down">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-10 h-10">
        <span class="text-lg font-semibold">Dashboard Anggota</span>
      </div>
      <button id="hamburgerBtn" class="md:hidden text-white focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
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
      <h1 class="text-xl md:text-2xl font-bold text-green-800 mb-6 text-center md:text-left" data-aos="fade-up">
        Selamat datang, {{ Auth::guard('member')->user()->nama_anggota }}!
      </h1>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg p-6 flex flex-col items-center text-center transition-all duration-300" data-aos="zoom-in" data-aos-delay="100">
          <div class="mb-3 bg-yellow-100 text-yellow-600 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <h3 class="text-lg font-bold text-green-800 mb-1">Profil</h3>
          <p class="text-sm text-gray-600 mb-4">Periksa dan perbarui informasi pribadi Anda.</p>
          <a href="{{ route('member.profil') }}" class="inline-block bg-yellow-400 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-yellow-500 transition">Lihat Profil</a>
        </div>

        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg p-6 flex flex-col items-center text-center transition-all duration-300" data-aos="zoom-in" data-aos-delay="200">
          <div class="mb-3 bg-yellow-100 text-yellow-600 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
            </svg>
          </div>
          <h3 class="text-lg font-bold text-green-800 mb-1">Katalog Buku</h3>
          <p class="text-sm text-gray-600 mb-4">Lihat koleksi buku yang tersedia untuk dipinjam.</p>
          <a href="{{ route('member.katalog') }}" class="inline-block bg-yellow-400 text-green-900 px-4 py-2 rounded-full font-semibold hover:bg-yellow-500 transition">Lihat Katalog</a>
        </div>

        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg p-6 flex flex-col items-center text-center transition-all duration-300" data-aos="zoom-in" data-aos-delay="300">
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
  <footer class="bg-green-900 text-white mt-10">
    <div class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
      <div data-aos="fade-right">
        <div class="flex items-center space-x-3 mb-4">
          <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-10 h-10">
          <h4 class="text-lg font-semibold">Perpustakaan Mandailing Natal</h4>
        </div>
        <p class="text-gray-300 leading-relaxed">
          Menyediakan layanan literasi dan informasi untuk masyarakat Madina melalui koleksi buku dan sistem digital yang mudah diakses.
        </p>
      </div>
      <div data-aos="fade-up" data-aos-delay="200">
        <h4 class="text-lg font-semibold mb-2">Navigasi</h4>
        <ul class="space-y-1 text-gray-300">
          <li><a href="{{ route('member.dashboard') }}" class="hover:text-yellow-300">Dashboard</a></li>
          <li><a href="{{ route('member.profil') }}" class="hover:text-yellow-300">Profil</a></li>
          <li><a href="{{ route('member.katalog') }}" class="hover:text-yellow-300">Katalog Buku</a></li>
          <li><a href="{{ route('member.riwayat') }}" class="hover:text-yellow-300">Riwayat</a></li>
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
    <div class="border-t border-green-700 py-4 text-center text-xs text-gray-400" data-aos="fade-in" data-aos-delay="400">
      &copy; 2025 Perpustakaan Daerah Mandailing Natal. Semua hak dilindungi.
    </div>
  </footer>

  <!-- Script -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
      duration: 800,
      easing: 'ease-in-out',
    });

    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    hamburgerBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
