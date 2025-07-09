@extends('layouts.member')

@section('title', 'Riwayat Peminjaman')

@section('content')
<section class="py-8 bg-gray-50 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-extrabold text-green-800 mb-10 text-center" data-aos="fade-down" data-aos-duration="1000">
            Riwayat <span class="text-green-600">Peminjaman</span>
        </h2>

        @if($loans->count())
            <div class="overflow-x-auto bg-white rounded-2xl shadow-xl border border-gray-100" data-aos="fade-up" data-aos-delay="200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-green-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider rounded-tl-2xl">
                                Judul Buku
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Tgl. Pinjam
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Tgl. Kembali
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Status Peminjaman
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">
                                Status Pengembalian
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider rounded-tr-2xl">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($loans as $index => $loan)
                            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out" data-aos="fade-up" data-aos-delay="{{ 300 + ($index * 50) }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $loan->book->judul_buku }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                    {{ $loan->tanggal_pinjam->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                    {{ $loan->tanggal_kembali->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                    @switch($loan->status)
                                        @case('ditolak')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Ditolak
                                            </span><br>
                                            <small class="text-xs text-gray-500 italic mt-1 block">Pengajuan tidak disetujui</small>
                                        @break

                                        @case('pending')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Menunggu Konfirmasi
                                            </span>
                                        @break

                                        @case('dipinjam')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Dipinjam
                                            </span>
                                        @break

                                        @case('dikembalikan')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Dikembalikan
                                            </span>
                                        @break

                                        @case('terlambat')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                                Terlambat
                                            </span>
                                        @break

                                        @default
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                {{ ucfirst($loan->status) }}
                                            </span>
                                    @endswitch
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                    @if($loan->return)
                                        @switch($loan->return->status)
                                            @case('pending')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    Menunggu Konfirmasi
                                                </span>
                                                <br>
                                                <small class="text-xs text-gray-500 mt-1 block">{{ $loan->return->tanggal_pengembalian->format('d M Y') }}</small>
                                            @break

                                            @case('diterima')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Sudah Dikembalikan
                                                </span>
                                                <br>
                                                <small class="text-xs text-gray-500 mt-1 block">{{ $loan->return->tanggal_pengembalian->format('d M Y') }}</small>
                                            @break

                                            @case('ditolak')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Ditolak
                                                </span>
                                                <br>
                                                <small class="text-xs text-gray-500 italic mt-1 block">Pengembalian tidak diterima</small>
                                            @break
                                        @endswitch
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500">
                                            Belum Diajukan
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                    @if(!$loan->return && $loan->status === 'dipinjam')
                                        <form action="{{ route('member.riwayat.ajukan', $loan->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="inline-flex items-center bg-yellow-400 text-green-900 px-4 py-2 rounded-full font-semibold shadow-md hover:bg-yellow-500 transition duration-300 ease-in-out transform hover:scale-105 text-xs">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10v11h18V10M3 10l9-7 9 7M3 10h18"></path></svg>
                                                Ajukan Pengembalian
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-sm text-gray-400">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center" data-aos="fade-up" data-aos-delay="100">
                <p class="text-gray-600 text-lg font-medium">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Belum ada riwayat peminjaman buku yang tercatat.
                </p>
                <a href="{{ route('member.katalog') }}" class="inline-flex items-center mt-6 bg-green-700 text-white font-bold py-3 px-6 rounded-full shadow-lg hover:bg-green-800 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                    Jelajahi Katalog Buku
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        @endif
    </div>
</section>
@endsection