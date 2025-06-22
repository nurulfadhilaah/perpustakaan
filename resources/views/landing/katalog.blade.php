<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Katalog Buku - Perpustakaan Mandailing Natal</title>
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
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
      <nav class="hidden md:flex space-x-4 text-sm items-center">
        <a href="/" class="hover:text-yellow-300">Beranda</a>
        <a href="/katalog" class="hover:text-yellow-300 font-bold underline">Katalog Buku</a>
        <a href="/tentang" class="hover:text-yellow-300">Tentang</a>
        <a href="/kontak" class="hover:text-yellow-300">Kontak</a>
        <a href="/login" class="bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Login</a>
        <a href="/register" class="bg-white text-green-900 border border-yellow-400 px-3 py-1 rounded hover:bg-yellow-100">Register</a>
      </nav>
    </div>

    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
      <nav class="space-y-2 text-sm">
        <a href="/" class="block hover:text-yellow-300">Beranda</a>
        <a href="/katalog" class="block hover:text-yellow-300 font-bold underline">Katalog Buku</a>
        <a href="/tentang" class="block hover:text-yellow-300">Tentang</a>
        <a href="/kontak" class="block hover:text-yellow-300">Kontak</a>
        <a href="/login" class="block bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500">Login</a>
        <a href="/register" class="block bg-white text-green-900 border border-yellow-400 px-3 py-1 rounded hover:bg-yellow-100">Register</a>
      </nav>
    </div>
  </header>

  <!-- Hero -->
  <section class="bg-gradient-to-r from-green-800 to-green-600 text-white py-20 px-4">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-4">Katalog Buku</h2>
      <p class="text-lg md:text-xl">Temukan buku favoritmu dan ajukan peminjaman secara online.</p>
    </div>
  </section>

  <!-- Katalog Section -->
  <section class="py-16 px-4 bg-gray-50">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($books as $book)
          <div class="bg-white shadow rounded p-4 flex flex-col">
            <img src="{{ asset('storage/' . $book->cover_buku) }}" alt="{{ $book->judul_buku }}" class="w-full h-48 object-cover mb-4 rounded">
            <h3 class="font-semibold text-lg text-green-800">{{ $book->judul_buku }}</h3>
            <p class="text-sm text-gray-600 mb-1">{{ $book->penulis }}</p>
            <p class="text-xs text-gray-500 mb-4">Kategori: {{ $book->category->nama_kategori ?? 'Umum' }}</p>
            <a href="/login" class="mt-auto inline-block bg-yellow-400 text-green-900 px-3 py-1 text-sm rounded hover:bg-yellow-500">Ajukan Peminjaman</a>
          </div>
        @empty
          <p class="col-span-full text-center text-gray-500">Belum ada buku yang tersedia.</p>
        @endforelse
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
