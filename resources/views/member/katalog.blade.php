@extends('layouts.member')

@section('title', 'Katalog Buku Anggota')

@section('content')
<section class="py-8 bg-gray-50 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-10 text-center" data-aos="fade-down" data-aos-duration="1000">
            Katalog Buku <span class="text-green-600">Perpustakaan</span>
        </h2>

        <!-- Pencarian & Filter -->
        <form method="GET" action="{{ route('member.katalog') }}" class="mb-12 grid grid-cols-1 md:grid-cols-3 gap-6 items-end" data-aos="fade-up" data-aos-delay="200">
            <div>
                <label for="search" class="block text-base font-medium text-gray-700 mb-2">Cari Judul Buku</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}"
                       placeholder="Masukkan judul buku..."
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:outline-none shadow-sm focus:border-transparent transition duration-200"/>
            </div>

            <div>
                <label for="kategori" class="block text-base font-medium text-gray-700 mb-2">Filter Kategori</label>
                <select name="kategori" id="kategori"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:outline-none shadow-sm focus:border-transparent transition duration-200">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoriList as $kategori)
                        <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                    class="w-full bg-green-700 text-white font-bold py-3 rounded-full shadow-lg hover:bg-green-800 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                Cari & Filter
            </button>
        </form>

        <!-- Daftar Buku -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($books as $index => $book)
                <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl overflow-hidden transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                    <div class="relative h-52 overflow-hidden">
                        <!-- book cover -->
                        <img src="{{ asset('storage/' . $book->cover_buku) }}"
                             alt="{{ $book->judul_buku }}"
                             class="w-full h-full object-cover object-center transition-transform duration-300 hover:scale-105">
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-green-900 mb-2">{{ $book->judul_buku }}</h3>

                        <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full mb-3 w-fit shadow-sm">
                            {{ $book->category->nama_kategori ?? 'Tanpa Kategori' }}
                        </span>

                        <p class="text-sm text-gray-600 flex-1 leading-relaxed mb-4">{{ Str::limit($book->deskripsi, 100, '...') }}</p>

                        <a href="{{ route('member.buku.detail', $book->id) }}"
                           class="inline-flex items-center justify-center mt-auto bg-yellow-400 text-green-900 px-6 py-3 rounded-full text-base font-semibold text-center shadow-md hover:bg-yellow-500 transition duration-300 ease-in-out transform hover:scale-105">
                            Lihat Detail
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500 text-lg py-10" data-aos="fade-up" data-aos-delay="100">Tidak ada buku ditemukan.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
