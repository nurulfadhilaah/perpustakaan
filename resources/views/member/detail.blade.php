@extends('layouts.member')

@section('title', 'Detail Buku')

@section('content')
<section class="py-8 bg-gray-50 px-4">
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-2xl p-6 md:p-10 border border-gray-100" data-aos="fade-up" data-aos-duration="1000">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Cover Buku -->
            <div data-aos="fade-right" data-aos-delay="200" class="bg-gray-100 rounded-lg shadow-inner flex items-center justify-center overflow-hidden">
                <img src="{{ asset('storage/' . $book->cover_buku) }}" alt="{{ $book->judul_buku }}"
                     class="w-full h-80 md:h-96 lg:h-[400px] object-contain rounded-lg transition-transform duration-300 hover:scale-105">
            </div>

            <!-- Info Buku -->
            <div class="space-y-6" data-aos="fade-left" data-aos-delay="300">
                <h2 class="text-3xl md:text-4xl font-extrabold text-green-800 leading-tight">{{ $book->judul_buku }}</h2>

                <div class="text-base text-gray-700 space-y-2">
                    <p><strong>Kategori:</strong> <span class="font-medium">{{ $book->category->nama_kategori ?? '-' }}</span></p>
                    <p><strong>Pengarang:</strong> <span class="font-medium">{{ $book->pengarang }}</span></p>
                    <p><strong>Penerbit:</strong> <span class="font-medium">{{ $book->penerbit }}</span></p>
                    <p><strong>Tahun Terbit:</strong> <span class="font-medium">{{ $book->tahun_terbit }}</span></p>
                    <p><strong>Jumlah Tersedia:</strong>
                        <span class="font-medium text-green-700">
                            {{ $book->copies()->where('status','tersedia')->count() }}
                        </span>
                    </p>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-green-800 mb-3">Deskripsi:</h3>
                    <p class="text-base text-gray-700 leading-relaxed">{{ $book->deskripsi }}</p>
                </div>

                <!-- Tombol Ajukan Peminjaman -->
                <form action="{{ route('member.peminjaman.ajukan', $book->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center bg-yellow-400 text-green-900 px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-yellow-500 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        Ajukan Peminjaman
                    </button>
                </form>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-12 text-center" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('member.katalog') }}"
               class="inline-flex items-center text-green-700 hover:text-green-900 hover:underline font-medium transition duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Katalog
            </a>
        </div>
    </div>
</section>
@endsection