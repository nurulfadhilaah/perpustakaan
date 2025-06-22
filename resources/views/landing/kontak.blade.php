<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak - Perpustakaan Daerah Mandailing Natal</title>
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
      <h2 class="text-3xl md:text-4xl font-bold mb-3">Hubungi Kami</h2>
      <p class="text-lg">Kami siap membantu Anda. Silakan hubungi kami melalui form atau informasi kontak di bawah ini.</p>
    </div>
  </section>

  <!-- Kontak Form & Info -->
  <section class="py-16 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Form -->
      <div class="bg-white p-6 rounded shadow">
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
      <div class="bg-white p-6 rounded shadow">
        <h3 class="text-xl font-semibold mb-4 text-green-900">Informasi Kontak</h3>
        <ul class="space-y-4 text-sm text-gray-700">
          <li><strong>Alamat:</strong><br> Jl. Willem Iskander, Panyabungan, Mandailing Natal, Sumatera Utara</li>
          <li><strong>Email:</strong><br> info@perpusmadina.go.id</li>
          <li><strong>Telepon:</strong><br> (0636) 123456</li>
          <li><strong>Jam Operasional:</strong><br> Senin - Jumat, 08.00 - 16.00 WIB</li>
        </ul>
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
