<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Anggota - Perpustakaan Daerah Mandailing Natal</title>
    <!-- Logo Atas -->
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
        /* Custom scrollbar  */
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
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col antialiased">

    <!-- Navbar -->
    <header class="bg-gradient-to-r from-green-900 to-green-700 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <!-- LOGO -->
                <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-10 h-10 rounded-full shadow-md">
                <span class="text-xl md:text-2xl font-bold tracking-tight">Dashboard Anggota</span>
            </div>

            <div class="md:hidden">
                <button id="hamburgerBtn" class="focus:outline-none p-2 rounded-md hover:bg-green-600 transition duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <nav id="navMenu" class="hidden md:flex md:space-x-6 text-base items-center font-medium">
                <a href="{{ route('member.profil') }}" class="hover:text-yellow-300 transition duration-300 ease-in-out transform hover:scale-105">Profil</a>
                <a href="{{ route('member.katalog') }}" class="hover:text-yellow-300 transition duration-300 ease-in-out transform hover:scale-105">Katalog Buku</a>
                <a href="{{ route('member.riwayat') }}" class="hover:text-yellow-300 transition duration-300 ease-in-out transform hover:scale-105">Riwayat</a>
                <form action="{{ route('member.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-yellow-400 text-green-900 px-5 py-2 rounded-full shadow-md hover:bg-yellow-500 transition duration-300 ease-in-out transform hover:scale-105">Logout</button>
                </form>
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-green-800 px-4 pt-2 pb-4 rounded-b-lg shadow-inner">
            <nav class="space-y-3 text-base font-medium">
                <a href="{{ route('member.profil') }}" class="block py-2 px-3 rounded-md text-white hover:bg-green-700 transition duration-200">Profil</a>
                <a href="{{ route('member.katalog') }}" class="block py-2 px-3 rounded-md text-white hover:bg-green-700 transition duration-200">Katalog Buku</a>
                <a href="{{ route('member.riwayat') }}" class="block py-2 px-3 rounded-md text-white hover:bg-green-700 transition duration-200">Riwayat</a>
                <form action="{{ route('member.logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full text-center bg-yellow-400 text-green-900 px-4 py-2 rounded-full hover:bg-yellow-500 transition duration-200">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow py-8 px-4">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl md:text-3xl font-extrabold text-green-800 mb-8 text-center md:text-left" data-aos="fade-up" data-aos-duration="1000">
            Selamat datang, <span class="text-green-600">{{ Auth::guard('member')->user()->nama_anggota ?? 'Anggota' }}</span>!
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Profil Card -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg p-6 flex flex-col items-center text-center transition duration-300 transform hover:-translate-y-1 border border-gray-100" data-aos="zoom-in" data-aos-delay="100">
                <div class="mb-3 bg-yellow-100 text-yellow-600 p-3 rounded-full shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1118.879 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-green-800 mb-1">Profil</h3>
                <p class="text-sm text-gray-600 mb-4">Periksa dan perbarui informasi pribadi Anda.</p>
                <a href="{{ route('member.profil') }}" class="inline-flex items-center bg-yellow-400 text-green-900 px-5 py-2.5 rounded-full text-sm font-semibold shadow-md hover:bg-yellow-500 transition duration-300 transform hover:scale-105">
                    Lihat Profil
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <!-- Katalog Buku Card -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg p-6 flex flex-col items-center text-center transition duration-300 transform hover:-translate-y-1 border border-gray-100" data-aos="zoom-in" data-aos-delay="200">
                <div class="mb-3 bg-yellow-100 text-yellow-600 p-3 rounded-full shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-green-800 mb-1">Katalog Buku</h3>
                <p class="text-sm text-gray-600 mb-4">Lihat koleksi buku yang tersedia untuk dipinjam.</p>
                <a href="{{ route('member.katalog') }}" class="inline-flex items-center bg-yellow-400 text-green-900 px-5 py-2.5 rounded-full text-sm font-semibold shadow-md hover:bg-yellow-500 transition duration-300 transform hover:scale-105">
                    Lihat Katalog
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <!-- Riwayat Card -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg p-6 flex flex-col items-center text-center transition duration-300 transform hover:-translate-y-1 border border-gray-100" data-aos="zoom-in" data-aos-delay="300">
                <div class="mb-3 bg-yellow-100 text-yellow-600 p-3 rounded-full shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-5H3v5a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-green-800 mb-1">Riwayat</h3>
                <p class="text-sm text-gray-600 mb-4">Lihat riwayat peminjaman dan pengembalian Anda.</p>
                <a href="{{ route('member.riwayat') }}" class="inline-flex items-center bg-yellow-400 text-green-900 px-5 py-2.5 rounded-full text-sm font-semibold shadow-md hover:bg-yellow-500 transition duration-300 transform hover:scale-105">
                    Lihat Riwayat
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
</main>


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
                    <li><a href="{{ route('member.dashboard') }}" class="hover:text-yellow-300 transition duration-200">Dashboard</a></li>
                    <li><a href="{{ route('member.profil') }}" class="hover:text-yellow-300 transition duration-200">Profil</a></li>
                    <li><a href="{{ route('member.katalog') }}" class="hover:text-yellow-300 transition duration-200">Katalog Buku</a></li>
                    <li><a href="{{ route('member.riwayat') }}" class="hover:text-yellow-300 transition duration-200">Riwayat</a></li>
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

    <!-- Script -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            easing: 'ease-out-cubic', /* Changed to ease-out-cubic for smoother animation */
        });

        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        hamburgerBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>