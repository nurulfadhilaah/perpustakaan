<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tentang - Perpustakaan Daerah Mandailing Natal</title>
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
                <a href="/tentang" class="hover:text-yellow-300 transition duration-300 ease-in-out transform hover:scale-105 text-yellow-300 font-bold">Tentang</a>
                <a href="/kontak" class="hover:text-yellow-300 transition duration-300 ease-in-out transform hover:scale-105">Kontak</a>
                <a href="/login" class="bg-yellow-400 text-green-900 px-5 py-2 rounded-full shadow-md hover:bg-yellow-500 transition duration-300 ease-in-out transform hover:scale-105">Login</a>
                <a href="/register" class="bg-white text-green-900 border border-yellow-400 px-5 py-2 rounded-full shadow-md hover:bg-yellow-100 transition duration-300 ease-in-out transform hover:scale-105">Register</a>
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-green-800 px-4 pt-2 pb-4 rounded-b-lg shadow-inner">
            <nav class="space-y-3 text-base font-medium">
                <a href="/" class="block py-2 px-3 rounded-md text-white hover:bg-green-700 transition duration-200">Beranda</a>
                <a href="/katalog" class="block py-2 px-3 rounded-md text-white hover:bg-green-700 transition duration-200">Katalog Buku</a>
                <a href="/tentang" class="block py-2 px-3 rounded-md text-yellow-300 font-bold hover:bg-green-700 transition duration-200">Tentang</a>
                <a href="/kontak" class="block py-2 px-3 rounded-md text-white hover:bg-green-700 transition duration-200">Kontak</a>
                <a href="/login" class="block text-center bg-yellow-400 text-green-900 px-4 py-2 rounded-full mt-4 hover:bg-yellow-500 transition duration-200">Login</a>
                <a href="/register" class="block text-center bg-white text-green-900 border border-yellow-400 px-4 py-2 rounded-full mt-2 hover:bg-yellow-100 transition duration-200">Register</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-green-800 to-green-600 text-white py-16 md:py-20 overflow-hidden">
        <div class="max-w-7xl mx-auto text-center relative z-10 px-4">
            <h1 data-aos="zoom-in" data-aos-duration="1200" class="text-3xl md:text-5xl font-extrabold mb-4 leading-tight drop-shadow-lg">
                Tentang <span class="text-yellow-300">Perpustakaan Daerah</span> Mandailing Natal
            </h1>
            <p data-aos="fade-up" data-aos-delay="300" class="text-base md:text-lg max-w-3xl mx-auto mb-6 opacity-90">
                Melayani kebutuhan informasi dan literasi masyarakat Mandailing Natal sejak berdirinya.
            </p>
        </div>
    </section>


    <!-- Visi Misi dan Sejarah Section -->
   <section class="py-12 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto space-y-10 text-gray-700">

            <!-- Visi -->
            <div class="bg-white shadow-lg rounded-2xl p-6 md:p-8 border border-gray-100" data-aos="fade-right" data-aos-duration="800">
                <h3 class="text-xl md:text-2xl font-bold text-green-900 mb-4 pb-2 border-b border-green-200 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                    </svg>
                    Visi
                </h3>
                <p class="text-base leading-relaxed">
                    Perpustakaan dan kearsipan sebagai sumber ilmu dan informasi yang handal menuju masyarakat Kabupaten Mandailing Natal yang cerdas, berbudaya, dan bermanfaat.
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-white shadow-lg rounded-2xl p-6 md:p-8 border border-gray-100" data-aos="fade-left" data-aos-duration="800">
                <h3 class="text-xl md:text-2xl font-bold text-green-900 mb-4 pb-2 border-b border-green-200 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                    Misi
                </h3>
                <ul class="list-none space-y-3 text-base leading-relaxed">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-1 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        Meningkatkan pembinaan dan pembangunan lembaga perpustakaan dan kearsipan.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-1 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        Meningkatkan profesionalitas dan kompetensi pengelola perpustakaan dan kearsipan.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-1 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        Mengembangkan budaya baca dan arsip.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-1 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        Memelihara dan melestarikan hasil karya cipta budaya.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-1 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        Meningkatkan kualitas SDM di bidang perpustakaan dan kearsipan.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-1 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        Menyelamatkan dan mendayagunakan pustaka dan arsip yang bernilai guna.
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 mt-1 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                        </svg>
                        Menyelenggarakan layanan perpustakaan dan kearsipan berbasis teknologi dan informasi.
                    </li>
                </ul>
            </div>

            <!-- Sejarah -->
            <div class="bg-white shadow-lg rounded-2xl p-6 md:p-8 border border-gray-100" data-aos="fade-up" data-aos-duration="800">
                <h3 class="text-xl md:text-2xl font-bold text-green-900 mb-4 pb-2 border-b border-green-200 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/>
                    </svg>
                    Sejarah Singkat
                </h3>
                <div class="text-base leading-relaxed text-justify space-y-4">
                    <p>Kabupaten Mandailing Natal resmi terbentuk dari pemekaran Kabupaten Tapanuli Selatan berdasarkan UU No. 12 Tahun 1998. Awalnya, Dinas Perpustakaan dan Kearsipan adalah bagian dari Bagian Organisasi Sekretariat Daerah, berdiri tahun 2000 melalui Perda No. 1 Tahun 2001.</p>
                    <p>Dengan terbitnya UU No. 32 Tahun 2004 tentang Pemerintahan Daerah, lembaga ini menjadi Kantor Perpustakaan dan Arsip Daerah, sesuai Perda No. 21 Tahun 2008 dan Perbup No. 39 Tahun 2011.</p>
                    <p>Terakhir, struktur organisasi disesuaikan lewat Perbup No. 50 Tahun 2016 dan berlaku efektif sejak Januari 2017 hingga kini.</p>
                </div>
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

    <!-- Script AOS -->
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