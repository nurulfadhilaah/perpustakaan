@extends('layouts.member')

@section('content')
<section class="py-16 bg-gray-50 px-4">
  <div class="max-w-6xl mx-auto">
    <div class="bg-white p-6 sm:p-8 rounded shadow">
      <h1 class="text-2xl font-bold text-green-800 mb-6 text-center">Profil Anggota</h1>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        <!-- Informasi -->
        <div>
          <div class="mb-3"><span class="font-semibold">Nama:</span> {{ $member->nama_anggota }}</div>
          <div class="mb-3"><span class="font-semibold">NIK:</span> {{ $member->nik }}</div>
          <div class="mb-3">
              <span class="font-semibold">No Anggota:</span>
              @if($member->no_anggota)
                  {{ $member->no_anggota }}
              @else
                  <span class="italic text-red-500">Belum diisi oleh admin</span>
              @endif
          </div>
          <div class="mb-3"><span class="font-semibold">Email:</span> {{ $member->email }}</div>
          <div class="mb-3"><span class="font-semibold">No HP:</span> {{ $member->no_hp }}</div>
          <div class="mb-3"><span class="font-semibold">Alamat:</span> {{ $member->alamat }}</div>
          <div class="mb-3"><span class="font-semibold">Tanggal Lahir:</span> {{ \Carbon\Carbon::parse($member->tgl_lahir)->format('d M Y') }}</div>

          <div class="mt-6 flex gap-3 flex-wrap">
            <a href="{{ route('member.cetak_kartu') }}" target="_blank" class="bg-yellow-400 text-green-900 px-4 py-2 rounded hover:bg-yellow-500 font-semibold">Cetak Kartu</a>
            <a href="{{ route('member.edit_profil') }}" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Edit Profil</a>
          </div>
        </div>

        <!-- Foto -->
        <div class="flex justify-center md:justify-end">
          <img src="{{ asset('storage/' . $member->foto) }}" alt="Foto Profil" class="w-40 h-40 rounded shadow object-cover">
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
