@extends('layouts.member')

@section('content')
<section class="py-16 bg-gray-50 px-4">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-2xl font-bold text-green-900 mb-6 text-center">Katalog Buku</h2>

    <!-- Pencarian & Filter -->
    <form method="GET" action="{{ route('member.katalog') }}"
          class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
      <input type="text" name="search" value="{{ request('search') }}"
             placeholder="Cari judul buku..."
             class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:outline-none"/>

      <select name="kategori"
              class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500 focus:outline-none">
        <option value="">Semua Kategori</option>
        @foreach($kategoriList as $kategori)
          <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
            {{ $kategori->nama_kategori }}
          </option>
        @endforeach
      </select>

      <button type="submit"
              class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition duration-150">
        Cari
      </button>
    </form>

    <!-- Daftar Buku -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @forelse($books as $book)
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition duration-200">
          <img src="{{ asset('storage/' . $book->cover_buku) }}"
               alt="{{ $book->judul_buku }}"
               class="h-48 w-full object-cover rounded-t-xl">

          <div class="p-4 space-y-2">
            <h3 class="text-lg font-bold text-green-900">{{ $book->judul_buku }}</h3>

            <span class="inline-block bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full">
              {{ $book->category->nama_kategori ?? 'Tanpa Kategori' }}
            </span>

            <p class="text-sm text-gray-600">{{ Str::limit($book->deskripsi, 80) }}</p>

            <a href="{{ route('member.buku.detail', $book->id) }}"
               class="inline-block mt-2 bg-yellow-400 text-green-900 px-4 py-1.5 rounded-md hover:bg-yellow-500 font-semibold text-sm transition">
              Lihat Detail
            </a>
          </div>
        </div>
      @empty
        <p class="col-span-full text-center text-gray-500 text-sm">Tidak ada buku ditemukan.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
