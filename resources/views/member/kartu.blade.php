<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kartu Anggota</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

  <div class="bg-white shadow-lg rounded-lg border p-6 w-[380px] text-sm text-gray-800 relative">
    <!-- Logo & Header -->
    <div class="flex items-center justify-between mb-4">
      <div class="flex items-center space-x-2">
        <img src="{{ asset('images/logomadina2.png') }}" class="w-10 h-10" alt="Logo">
        <div>
          <p class="text-xs uppercase text-gray-500">Kartu Anggota</p>
          <p class="text-sm font-bold text-green-800">Perpustakaan Mandailing Natal</p>
        </div>
      </div>
      <img src="{{ asset('storage/' . $member->foto) }}" class="w-16 h-20 rounded border object-cover" alt="Foto">
    </div>

    <!-- Info Anggota -->
    <div class="space-y-1 mt-4 text-[13px]">
      <div><span class="font-semibold">Nama</span> : {{ $member->nama_anggota }}</div>
      <div><span class="font-semibold">NIK</span> : {{ $member->nik }}</div>
      <div><span class="font-semibold">No. Anggota</span> : {{ $member->no_anggota }}</div>
      <div><span class="font-semibold">Email</span> : {{ $member->email }}</div>
      <div><span class="font-semibold">No. HP</span> : {{ $member->no_hp }}</div>
      <div><span class="font-semibold">Alamat</span> : {{ $member->alamat }}</div>
    </div>

    <!-- Footer -->
    <div class="text-right mt-6 text-xs text-gray-500">
      <p>Diterbitkan: {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
      <p class="italic">Perpustakaan Mandailing Natal</p>
    </div>

    <!-- Tombol Cetak -->
    <div class="no-print mt-4 text-center">
      <button onclick="window.print()" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
        Cetak Kartu
      </button>
    </div>
  </div>

</body>
</html>
