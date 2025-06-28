<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Perpustakaan Daerah Mandailing Natal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gradient-to-br from-green-900 to-green-600 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 sm:p-8">
    <div class="text-center mb-6">
      <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-16 h-16 mx-auto mb-3">
      <h2 class="text-2xl font-bold text-green-800">Selamat Datang!</h2>
      <p class="text-sm text-gray-600">Silakan login untuk masuk ke sistem</p>
    </div>

    @if (session('error'))
      <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="mb-4 px-4 py-3 border border-red-400 text-red-700 bg-red-100 rounded text-sm">
        {{ session('error') }}
      </div>
    @endif

    <form method="POST" action="{{ route('universal.login') }}" class="space-y-5">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
          placeholder="email@example.com" required>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
          placeholder="********" required>
      </div>

      <div class="flex justify-between items-center text-sm">
        <label class="flex items-center space-x-2 text-gray-600">
          <input type="checkbox" name="remember" class="rounded text-green-600">
          <span>Ingat saya</span>
        </label>
        {{-- <a href="#" class="text-green-700 hover:underline">Lupa password?</a> --}}
      </div>

      <button type="submit"
        class="w-full bg-green-700 text-white font-semibold py-2 rounded-lg hover:bg-green-800 transition duration-200">
        Masuk
      </button>

      <p class="text-center text-sm text-gray-700 mt-4">
        Belum punya akun? <a href="{{ route('register') }}" class="text-green-800 font-semibold hover:underline">Daftar sekarang</a>
      </p>
    </form>
  </div>

</body>
</html>
