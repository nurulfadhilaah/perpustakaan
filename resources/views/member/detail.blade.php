@extends('layouts.member')

@section('content')
<section class="py-16 bg-gray-50 px-4">
  <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Cover Buku -->
      <div>
        <img src="{{ asset('storage/' . $book->cover_buku) }}" alt="{{ $book->judul_buku }}"
             class="w-full h-80 object-cover rounded-lg shadow">
      </div>

      <!-- Info Buku -->
      <div class="space-y-4">
        <h2 class="text-2xl font-bold text-green-900">{{ $book->judul_buku }}</h2>
        
        <div class="text-sm text-gray-600">
          <p><strong>Kategori:</strong> {{ $book->category->nama_kategori ?? '-' }}</p>
          <p><strong>Pengarang:</strong> {{ $book->pengarang }}</p>
          <p><strong>Penerbit:</strong> {{ $book->penerbit }}</p>
          <p><strong>Tahun Terbit:</strong> {{ $book->tahun_terbit }}</p>
          <p><strong>Jumlah Tersedia:</strong> {{ $book->jumlah_eksemplar }}</p>
        </div>

        <div>
          <h3 class="font-semibold text-green-800">Deskripsi:</h3>
          <p class="text-sm text-gray-700 leading-relaxed">{{ $book->deskripsi }}</p>
        </div>

        <!-- Tombol Ajukan Peminjaman -->
        <form action="{{ route('member.peminjaman.ajukan', $book->id) }}" method="POST">
          @csrf
          <button type="submit"
                  class="mt-4 bg-yellow-400 text-green-900 px-6 py-2 rounded-md hover:bg-yellow-500 transition font-semibold">
            Ajukan Peminjaman
          </button>
        </form>
      </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-8 text-center">
      <a href="{{ route('member.katalog') }}"
         class="text-sm text-green-700 hover:underline">
        &larr; Kembali ke Katalog
      </a>
    </div>
  </div>
</section>
@endsection
