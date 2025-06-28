@extends('layouts.member')

@section('content')
<section class="py-16 bg-gray-50 px-4">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-2xl md:text-3xl font-bold text-green-900 mb-8 text-center">Katalog Buku</h2>

    <!-- Pencarian & Filter -->
    <form method="GET" action="{{ route('member.katalog') }}" class="mb-10 grid grid-cols-1 md:grid-cols-3 gap-4">
      <input type="text" name="search" value="{{ request('search') }}"
             placeholder="Cari judul buku..."
             class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none shadow-sm"/>

      <select name="kategori"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none shadow-sm">
        <option value="">Semua Kategori</option>
        @foreach($kategoriList as $kategori)
          <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
            {{ $kategori->nama_kategori }}
          </option>
        @endforeach
      </select>

      <button type="submit"
              class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition duration-150 shadow-sm">
        Cari
      </button>
    </form>

    <!-- Daftar Buku -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      @forelse($books as $book)
        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg overflow-hidden transition duration-300 flex flex-col">
          <div class="relative h-52 overflow-hidden">
            <img src="{{ asset('storage/' . $book->cover_buku) }}"
                 alt="{{ $book->judul_buku }}"
                 class="w-full h-full object-cover object-center transition-transform duration-300 hover:scale-105">
          </div>

          <div class="p-4 flex flex-col flex-1">
            <h3 class="text-lg font-bold text-green-900 mb-1">{{ $book->judul_buku }}</h3>

            <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full mb-2 w-fit">
              {{ $book->category->nama_kategori ?? 'Tanpa Kategori' }}
            </span>

            <p class="text-sm text-gray-600 flex-1">{{ Str::limit($book->deskripsi, 80) }}</p>

            <a href="{{ route('member.buku.detail', $book->id) }}"
               class="mt-3 bg-yellow-400 text-green-900 px-4 py-2 rounded-lg text-sm font-semibold text-center hover:bg-yellow-500 transition-colors">
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
