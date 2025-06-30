<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Perpustakaan Daerah Mandailing Natal</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logomadina2.png') }}">
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

      <div x-data="{ show: false }">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <div class="relative">
          <input :type="show ? 'text' : 'password'" name="password" id="password"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-500"
            placeholder="********" required>

          <button type="button" @click="show = !show"
            class="absolute inset-y-0 right-2 flex items-center text-gray-600 focus:outline-none">
            <!-- Eye Icon (show password) -->
            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <!-- Eye Off Icon (hide password) -->
            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.965 9.965 0 012.293-3.95m3.122-2.1A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.965 9.965 0 01-4.293 5.184M15 12a3 3 0 01-3 3m0-6a3 3 0 013 3m-6 0a3 3 0 003 3m-6 0L3 3m0 0l18 18" />
            </svg>
          </button>
        </div>
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
