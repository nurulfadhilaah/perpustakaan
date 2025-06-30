<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - Perpustakaan Daerah Mandailing Natal</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logomadina2.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-900 to-green-600 min-h-screen flex items-center justify-center px-4 py-8">

  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-6 sm:p-10">
    <div class="text-center mb-6">
      <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-16 h-16 mx-auto mb-3">
      <h2 class="text-2xl font-bold text-green-800">Pendaftaran Anggota Baru</h2>
      <p class="text-sm text-gray-600">Silakan isi data lengkap untuk membuat akun</p>
    </div>

    @if($errors->any())
      <div class="mb-4 bg-red-100 border border-red-400 text-red-700 p-3 rounded">
        <ul class="text-sm list-disc list-inside">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-4">
      @csrf

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
          <input type="text" name="nama_anggota" value="{{ old('nama_anggota') }}" class="form-input" placeholder="Nama lengkap" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
          <input type="text" name="nik" value="{{ old('nik') }}" class="form-input" placeholder="Nomor Induk Kependudukan" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
          <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" class="form-input" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
          <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-input" placeholder="Alamat lengkap" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">No HP</label>
          <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-input" placeholder="08xxxxxxxxxx" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-input" placeholder="email@example.com" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto</label>
          <input type="file" name="foto" accept="image/*" class="form-input p-1">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Upload KTP</label>
          <input type="file" name="ktp" class="form-input p-1">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input type="password" name="password" class="form-input" placeholder="Minimal 6 karakter" required>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-input" placeholder="Ulangi password" required>
        </div>
      </div>

      <button type="submit" class="w-full mt-4 bg-green-700 text-white font-semibold py-2 rounded-lg hover:bg-green-800 transition">
        Daftar Sekarang
      </button>

      <p class="text-center text-sm mt-4 text-gray-700">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-green-800 font-semibold hover:underline">Login di sini</a>
      </p>
    </form>
  </div>

  <style>
    .form-input {
      @apply w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500;
    }
  </style>

</body>
</html>
