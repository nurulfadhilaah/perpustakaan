<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Perpustakaan Daerah Mandailing Natal</title>
    <!-- logo Atas -->
    <link rel="icon" type="image/png" href="{{ asset('images/logomadina2.png') }}">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AOS for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom scrollbar */
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
<body class="bg-gray-50 text-gray-800 antialiased">
    <!-- Navbar -->
    <header class="bg-gradient-to-r from-green-900 to-green-700 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <!-- LOGO -->
                <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-10 h-10 rounded-full shadow-md">
                <span class="text-xl md:text-2xl font-bold tracking-tight">Perpustakaan Daerah Mandailing Natal</span>
            </div>

            <div class="md:hidden">
                <button onclick="toggleMenu()" class="focus:outline-none p-2 rounded-md hover:bg-green-600 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <nav class="hidden md:flex space-x-6 text-base items-center font-medium">
                <a href="/" class="hover:text-yellow-300 transition duration-300 ease-in-out transform hover:scale-105">Beranda</a>
                <a href="/katalog" class="hover:text-yellow-300 transition duration-300 ease-in-out transform hover:scale-105">Katalog Buku</a>
                <a href="/tentang" class="hover:text-yellow-300 transition duration-300 ease-in-out transform hover:scale-105">Tentang</a>
                <a href="/kontak" class="hover:text-yellow-300 transition duration-300 ease-in-out transform hover:scale-105 text-yellow-300 font-bold">Kontak</a>
                <a href="/login" class="bg-yellow-400 text-green-900 px-5 py-2 rounded-full shadow-md hover:bg-yellow-500 transition duration-300 ease-in-out transform hover:scale-105">Login</a>
                <a href="/register" class="bg-white text-green-900 border border-yellow-400 px-5 py-2 rounded-full shadow-md hover:bg-yellow-100 transition duration-300 ease-in-out transform hover:scale-105">Register</a>
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-green-800 px-4 pt-2 pb-4 rounded-b-lg shadow-inner">
            <nav class="space-y-3 text-base font-medium">
                <a href="/" class="block py-2 px-3 rounded-md text-white hover:bg-green-700 transition duration-200">Beranda</a>
                <a href="/katalog" class="block py-2 px-3 rounded-md text-white hover:bg-green-700 transition duration-200">Katalog Buku</a>
                <a href="/tentang" class="block py-2 px-3 rounded-md text-white hover:bg-green-700 transition duration-200">Tentang</a>
                <a href="/kontak" class="block py-2 px-3 rounded-md text-yellow-300 font-bold hover:bg-green-700 transition duration-200">Kontak</a>
                <a href="/login" class="block text-center bg-yellow-400 text-green-900 px-4 py-2 rounded-full mt-4 hover:bg-yellow-500 transition duration-200">Login</a>
                <a href="/register" class="block text-center bg-white text-green-900 border border-yellow-400 px-4 py-2 rounded-full mt-2 hover:bg-yellow-100 transition duration-200">Register</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-green-800 to-green-600 text-white py-16 md:py-20 overflow-hidden">
        <div class="max-w-7xl mx-auto text-center relative z-10 px-4">
            <h1 data-aos="zoom-in" data-aos-duration="1200" class="text-3xl md:text-5xl font-extrabold mb-4 leading-tight drop-shadow-lg">
                Hubungi <span class="text-yellow-300">Perpustakaan Daerah</span> Mandailing Natal
            </h1>
            <p data-aos="fade-up" data-aos-delay="300" class="text-base md:text-lg max-w-3xl mx-auto mb-6 opacity-90">
                Kami siap membantu Anda. Silakan hubungi kami melalui formulir atau informasi kontak di bawah ini.
            </p>
        </div>
    </section>


    <!-- Kontak Form & Info Section -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Form -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100" data-aos="fade-right" data-aos-duration="800">
                <h3 class="text-2xl font-bold mb-6 text-green-900">Kirim Pesan Kritik dan Saran</h3>
                <form action="{{ route('kontak.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="nama" class="block text-base font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" required>
                    </div>
                    <div>
                        <label for="email" class="block text-base font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" required>
                    </div>
                    <div>
                        <label for="pesan" class="block text-base font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea id="pesan" name="pesan" rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200" required></textarea>
                    </div>
                    <button type="submit" class="inline-flex items-center justify-center bg-green-700 text-white font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-green-800 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        Kirim Pesan
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </button>
                    @if(session('success'))
                        <div class="mt-4 bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg text-sm" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>

            <!-- Info Kontak -->
            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100" data-aos="fade-left" data-aos-duration="800">
                <h3 class="text-2xl font-bold mb-6 text-green-900">Informasi Kontak</h3>
                <ul class="space-y-5 text-base text-gray-700">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 mr-3 flex-shrink-0 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        <div>
                            <strong class="block">Alamat:</strong>
                            Jl. Merdeka No. 2 Kel. Kayu Jati, Kec. Panyabungan, Kab. Mandailing Natal, Sumatera Utara
                        </div>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-6 h-6 mr-3 flex-shrink-0 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        <div>
                            <strong class="block">Email:</strong>
                            <a href="mailto:disperpus@mail.madina.go.id" class="hover:underline text-green-700">disperpus@mail.madina.go.id</a>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-6 h-6 mr-3 flex-shrink-0 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.32.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                        <div>
                            <strong class="block">Telepon:</strong>
                            (0636) 321824
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 mr-3 flex-shrink-0 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-.5 15.5h-1v-6h1v6zm1.5-6H12v-1h2v1zm-2-2h-1V7h1v2z"/></svg>
                        <div>
                            <strong class="block">Jam Operasional:</strong>
                            Senin - Jumat, 08.00 - 16.00 WIB
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-900 text-white mt-16 py-12 px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-10 text-sm">

            <div data-aos="fade-right" data-aos-duration="800" class="lg:col-span-2">
                <div class="flex items-center space-x-3 mb-4">
                    <!-- Logo Footer -->
                    <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-10 h-10 rounded-full shadow-md">
                    <h4 class="text-xl font-bold tracking-tight">Perpustakaan Mandailing Natal</h4>
                </div>
                <p class="text-gray-300 leading-relaxed max-w-md">
                    Menyediakan layanan literasi dan informasi yang inovatif untuk masyarakat Madina melalui koleksi buku dan sistem digital yang mudah diakses.
                </p>
            </div>

            <div data-aos="fade-up" data-aos-duration="800">
                <h4 class="text-lg font-semibold mb-4 text-yellow-300">Navigasi Cepat</h4>
                <ul class="space-y-3 text-gray-300">
                    <li><a href="/" class="hover:text-yellow-300 transition duration-200">Beranda</a></li>
                    <li><a href="/katalog" class="hover:text-yellow-300 transition duration-200">Katalog Buku</a></li>
                    <li><a href="/tentang" class="hover:text-yellow-300 transition duration-200">Tentang Kami</a></li>
                    <li><a href="/kontak" class="hover:text-yellow-300 transition duration-200">Kontak</a></li>
                </ul>
            </div>

            <div data-aos="fade-left" data-aos-duration="800">
                <h4 class="text-lg font-semibold mb-4 text-yellow-300">Hubungi Kami</h4>
                <ul class="text-gray-300 space-y-3">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0 text-yellow-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        Jl. Merdeka No. 2 Kel. Kayu Jati, Panyabungan, Mandailing Natal
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        Email: <a href="mailto:disperpus@mail.madina.go.id" class="hover:underline text-yellow-300">disperpus@mail.madina.go.id</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.32.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                        Telepon: (0636) 321824
                    </li>
                </ul>
                <div class="mt-6">
                    <h5 class="text-base font-semibold mb-3 text-yellow-300">Ikuti Kami</h5>
                    <div class="flex space-x-5">
                        <a href="https://www.facebook.com/people/Disperpusip-Kab-Madina/pfbid02gL7QDb3PXJB92fsge8ycW47Vof6KmEFP5iUTVoqvpgAdjQ3Kkq8mp71MSmm6CMbCl/?rdid=h95HDdQt8VpkvYL0&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1FKGMEc7i2%2F" target="_blank" class="text-gray-300 hover:text-yellow-400 transition duration-300 transform hover:scale-110">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.2 3-3.2.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2V12h2.5l-.4 3h-2.1v7A10 10 0 0 0 22 12z"/></svg>
                        </a>
                        <a href="https://www.instagram.com/disperpusipkabmadina/" target="_blank" class="text-gray-300 hover:text-yellow-400 transition duration-300 transform hover:scale-110">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.7 0 3 1.3 3 3v10c0 1.7-1.3 3-3 3H7c-1.7 0-3-1.3-3-3V7c0-1.7 1.3-3 3-3h10zm-5 3a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm4.5-2a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-green-700 mt-10 pt-6 text-center text-xs text-gray-400">
            &copy; 2025 Perpustakaan Daerah Mandailing Natal. Semua hak dilindungi.
        </div>
    </footer>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            once: true, // Whether animation should happen only once - while scrolling down
            duration: 800, // Values from 0 to 3000, with step 50ms
            easing: 'ease-out-cubic', // Easing options for AOS animations
        });

        // Toggle mobile menu
        function toggleMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }
    </script>
</body>
</html>