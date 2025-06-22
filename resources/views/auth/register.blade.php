<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register Member - Perpustakaan Mandailing Natal</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-8">
      <h2 class="text-3xl font-bold text-green-800 text-center mb-6">Daftar Member Baru</h2>

      @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 p-3 rounded">
          <ul class="text-sm list-disc list-inside">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
            <input type="text" name="nama_anggota" value="{{ old('nama_anggota') }}" class="input" placeholder="Nama Lengkap" required>
          </div>
          <div>
            <label class="block text-sm font-semibold mb-1">NIK</label>
            <input type="text" name="nik" value="{{ old('nik') }}" class="input" placeholder="Nomor Induk Kependudukan" required>
          </div>

          {{-- <div>
            <label class="block text-sm font-semibold mb-1">Nomor Anggota</label>
            <input type="text" name="no_anggota" value="{{ old('no_anggota') }}" class="input" placeholder="Contoh: A00123" required>
          </div> --}}
          <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" class="input" required>
          </div>

          <div>
            <label class="block text-sm font-semibold mb-1">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat') }}" class="input" placeholder="Alamat Lengkap" required>
          </div>
          <div>
            <label class="block text-sm font-semibold mb-1">No HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="input" placeholder="08xxxxxxxxxx" required>
          </div>

          <div>
            <label class="block text-sm font-semibold mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="input" placeholder="email@example.com" required>
          </div>
          <div>
            <label class="block text-sm font-semibold mb-1">Upload Foto</label>
            <input type="file" name="foto" accept="image/*" class="input p-1">
          </div>
          <div>
            <label class="block text-sm font-medium">Upload KTP</label>
            <input type="file" name="ktp" class="input p-1">
          </div>        

          <div>
            <label class="block text-sm font-semibold mb-1">Password</label>
            <input type="password" name="password" class="input" placeholder="Minimal 6 karakter" required>
          </div>
          <div>
            <label class="block text-sm font-semibold mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="input" placeholder="Ulangi password" required>
          </div>
        </div>

        <button type="submit" class="w-full bg-green-700 text-white mt-6 py-2 rounded hover:bg-green-800 font-semibold transition duration-200">
          Daftar Sekarang
        </button>
        <p class="text-sm text-center mt-4">Sudah punya akun? <a href="/login" class="text-green-700 underline">Login</a></p>
      </form>
    </div>
  </div>

  <style>
    .input {
      @apply border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 w-full;
    }
  </style>

</body>
</html>
