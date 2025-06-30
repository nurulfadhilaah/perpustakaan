<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Dashboard Anggota')</title>
   <link rel="icon" type="image/png" href="{{ asset('images/logomadina2.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <script>
    function toggleMenu() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    }
  </script>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

  <!-- Navbar -->
  <header class="bg-green-900 text-white shadow-md" data-aos="fade-down">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-10 h-10">
        <span class="text-lg font-semibold">Perpustakaan Daerah Mandailing Natal</span>
      </div>
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
      <div class="md:hidden">
        <button onclick="toggleMenu()">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
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
  <div class="max-w-7xl mx-auto px-4" data-aos="fade-down" data-aos-delay="200">
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
  <main class="flex-grow py-8 px-4" data-aos="fade-up" data-aos-delay="300">
    @yield('content')
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

  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
      duration: 800,
      easing: 'ease-in-out',
    });
  </script>

</body>
</html>
