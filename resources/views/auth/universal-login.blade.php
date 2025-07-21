<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - Perpustakaan Daerah Mandailing Natal</title>
    <!-- logo atas -->
    <link rel="icon" type="image/png" href="{{ asset('images/logomadina2.png') }}">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for interactive elements -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom scrollbar for a modern look */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #10B981; /* Tailwind green-500 */
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #059669; /* Tailwind green-600 */
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-900 to-green-600 min-h-screen flex items-center justify-center px-4 py-8">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 sm:p-10 transform transition-all duration-300 hover:scale-[1.01]">
        <div class="text-center mb-8">
            <!-- LOGO -->
            <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-20 h-20 mx-auto mb-4 rounded-full shadow-md">
            <h2 class="text-3xl font-extrabold text-green-800 mb-2">Selamat Datang Kembali!</h2>
            <p class="text-base text-gray-600">Silakan masuk ke akun Anda</p>
        </div>

        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
                class="mb-6 px-5 py-3 border border-green-400 text-green-800 bg-green-100 rounded-lg text-sm font-medium animate-fade-in-down" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
                class="mb-6 px-5 py-3 border border-red-400 text-red-800 bg-red-100 rounded-lg text-sm font-medium animate-fade-in-down" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('universal.login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-base font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                    placeholder="email@example.com" required autocomplete="email">
            </div>

            <div x-data="{ show: false }">
                <label for="password" class="block text-base font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" name="password" id="password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="********" required autocomplete="current-password">

                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none transition duration-200">
                        <!-- Eye Icon (show password) -->
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <!-- Eye Off Icon (hide password) -->
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.965 9.965 0 012.293-3.95m3.122-2.1A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.965 9.965 0 01-4.293 5.184M15 12a3 3 0 01-3 3m0-6a3 3 0 013 3m-6 0a3 3 0 003 3m-6 0L3 3m0 0l18 18" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center text-sm">
                <label class="flex items-center space-x-2 text-gray-600 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded text-green-600 focus:ring-green-500">
                    <span>Ingat saya</span>
                </label>

                 <a href="{{ route('forgot.form') }}" class="text-green-700 hover:text-green-900 font-medium transition">
                    Lupa Password?
                </a>
            </div>

            <button type="submit"
                class="w-full bg-green-700 text-white font-bold py-3 rounded-full shadow-lg hover:bg-green-800 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 flex items-center justify-center">
                Masuk
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
            </button>

            <p class="text-center text-base text-gray-700 mt-6">
                Belum punya akun? <a href="{{ route('register') }}" class="text-green-800 font-bold hover:underline transition duration-200">Daftar sekarang</a>
            </p>
        </form>
    </div>

</body>
</html>