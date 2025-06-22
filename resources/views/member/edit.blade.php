@extends('layouts.member')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow-md mt-8">
    <h2 class="text-2xl font-bold text-green-800 mb-6">Edit Profil</h2>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 border border-red-300 rounded text-sm">
            <ul class="list-disc ml-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('member.profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
            <input type="text" name="nama_anggota" value="{{ old('nama_anggota', $member->nama_anggota) }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-600" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp', $member->no_hp) }}" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Alamat</label>
            <textarea name="alamat" rows="3" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-600">{{ old('alamat', $member->alamat) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Foto</label>
            @if ($member->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $member->foto) }}" alt="Foto Profil" class="w-24 h-24 object-cover rounded-full">
                </div>
            @endif
            <input type="file" name="foto" class="block w-full text-sm text-gray-700 border border-gray-300 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">KTP</label>
            @if ($member->ktp)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $member->ktp) }}" alt="KTP" class="w-24 h-24 object-cover rounded-full">
                </div>
            @endif
            <input type="file" name="ktp" class="block w-full text-sm text-gray-700 border border-gray-300 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Password Baru <span class="text-gray-500 text-sm">(opsional)</span></label>
            <input type="password" name="password" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
