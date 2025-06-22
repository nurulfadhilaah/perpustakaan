@extends('layouts.member')

@section('content')
<section class="py-16 bg-gray-50 px-4">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-2xl font-bold text-green-900 mb-6 text-center">Riwayat Peminjaman</h2>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    @if($loans->count())
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
          <thead>
            <tr class="bg-green-900 text-white">
              <th class="px-4 py-2 text-left">Judul Buku</th>
              <th class="px-4 py-2">Tanggal Pinjam</th>
              <th class="px-4 py-2">Tanggal Kembali</th>
              <th class="px-4 py-2">Status</th>
              <th class="px-4 py-2">Pengembalian</th>
              <th class="px-4 py-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($loans as $loan)
              <tr class="border-t">
                <td class="px-4 py-2">{{ $loan->book->judul_buku }}</td>
                <td class="px-4 py-2">{{ $loan->tanggal_pinjam->format('d M Y') }}</td>
                <td class="px-4 py-2">{{ $loan->tanggal_kembali->format('d M Y') }}</td>
                <td class="px-4 py-2 capitalize">
                    @switch($loan->status)
                        @case('ditolak')
                        <span class="text-red-600 font-semibold">Ditolak</span><br>
                        <small class="text-xs text-gray-500 italic">Pengajuan tidak disetujui oleh admin</small>
                        @break

                        @case('pending')
                        <span class="text-yellow-500 font-semibold">Menunggu Konfirmasi</span>
                        @break

                        @case('dipinjam')
                        <span class="text-blue-600 font-semibold">Dipinjam</span>
                        @break

                        @case('dikembalikan')
                        <span class="text-green-600 font-semibold">Dikembalikan</span>
                        @break

                        @case('terlambat')
                        <span class="text-orange-500 font-semibold">Terlambat</span>
                        @break

                        @default
                        <span class="text-gray-500">{{ ucfirst($loan->status) }}</span>
                    @endswitch
                </td>
                <td class="px-4 py-2">
                    @if($loan->return)
                        @switch($loan->return->status)
                        @case('pending')
                            <span class="text-yellow-500 font-semibold">Menunggu Konfirmasi</span>
                            <br>
                            <small>{{ $loan->return->tanggal_pengembalian->format('d M Y') }}</small>
                            @break

                        @case('diterima')
                            <span class="text-green-600 font-semibold">Sudah dikembalikan</span>
                            <br>
                            <small>{{ $loan->return->tanggal_pengembalian->format('d M Y') }}</small>
                            @break

                        @case('ditolak')
                            <span class="text-red-600 font-semibold">Ditolak</span>
                            <br>
                            <small class="text-xs text-gray-500 italic">Pengembalian tidak diterima</small>
                            @break
                        @endswitch
                    @else
                        <span class="text-gray-500 italic">Belum</span>
                    @endif
                </td>
                <td class="px-4 py-2">
                  @if(!$loan->return && $loan->status === 'dipinjam')
                    <form action="{{ route('member.riwayat.ajukan', $loan->id) }}" method="POST">
                      @csrf
                      <button type="submit"
                              class="bg-yellow-400 text-green-900 px-3 py-1 rounded hover:bg-yellow-500 text-sm">
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
      <p class="text-gray-600 text-center">Belum ada riwayat peminjaman.</p>
    @endif
  </div>
</section>
@endsection
