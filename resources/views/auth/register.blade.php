<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register - Perpustakaan Daerah Mandailing Natal</title>
    <!--logo atas-->
    <link rel="icon" type="image/png" href="{{ asset('images/logomadina2.png') }}">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
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
        /* Custom styling for file input to make it consistent */
        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }
        .custom-file-input::before {
            content: 'Pilih File';
            display: inline-block;
            background: #E5E7EB; /* Tailwind gray-200 */
            border: 1px solid #D1D5DB; /* Tailwind gray-300 */
            border-radius: 0.5rem; /* Tailwind rounded-lg */
            padding: 0.5rem 1rem;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            font-weight: 500; /* Tailwind font-medium */
            font-size: 0.875rem; /* Tailwind text-sm */
            color: #4B5563; /* Tailwind gray-700 */
            transition: all 0.2s ease-in-out;
        }
        .custom-file-input:hover::before {
            background: #D1D5DB; /* Tailwind gray-300 */
        }
        .custom-file-input:active::before {
            background: #9CA3AF; /* Tailwind gray-400 */
        }
        .custom-file-input:focus::before {
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.5); /* Tailwind ring-green-500 */
            border-color: #10B981; /* Tailwind green-500 */
        }
        .custom-file-input {
            @apply w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-900 to-green-600 min-h-screen flex items-center justify-center px-4 py-8">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-6 sm:p-10 transform transition-all duration-300 hover:scale-[1.01]">
        <div class="text-center mb-8">
            <!-- LOGO -->
            <img src="{{ asset('images/logomadina2.png') }}" alt="Logo Madina" class="w-20 h-20 mx-auto mb-4 rounded-full shadow-md">
            <h2 class="text-3xl font-extrabold text-green-800 mb-2">Pendaftaran Anggota Baru</h2>
            <p class="text-base text-gray-600">Silakan isi data lengkap untuk membuat akun</p>
        </div>

        @if($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 p-4 rounded-lg text-sm font-medium animate-fade-in-down" role="alert">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="nama_anggota" class="block text-base font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" id="nama_anggota" name="nama_anggota" value="{{ old('nama_anggota') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="Nama lengkap Anda" required>
                </div>

                <div>
                    <label for="nik" class="block text-base font-medium text-gray-700 mb-2">NIK</label>
                    <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="Nomor Induk Kependudukan" required>
                </div>

                <div>
                    <label for="tgl_lahir" class="block text-base font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        required>
                </div>

                <div>
                    <label for="alamat" class="block text-base font-medium text-gray-700 mb-2">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="Alamat lengkap Anda" required>
                </div>

                <div>
                    <label for="no_hp" class="block text-base font-medium text-gray-700 mb-2">No HP</label>
                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="08xxxxxxxxxx" required>
                </div>

                <div>
                    <label for="email" class="block text-base font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="email@example.com" required>
                </div>

               <!-- Upload Foto -->
                <div>
                  <label for="foto" class="block text-sm font-semibold text-gray-700 mb-2">Upload Foto</label>
                  <input type="file" id="foto" name="foto" accept="image/*"
                    class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none focus:ring-2 focus:ring-green-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-green-800 hover:file:bg-green-200 transition duration-200"
                    required>
                </div>

                <!-- Upload KTP/Kartu Keluarga -->
                <div>
                  <label for="ktp" class="block text-sm font-semibold text-gray-700 mb-2">Upload KTP / Kartu Keluarga</label>
                  <input type="file" id="ktp" name="ktp" accept="image/*"
                    class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none focus:ring-2 focus:ring-green-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-green-800 hover:file:bg-green-200 transition duration-200"
                    required>
                </div>
                <div>
                    <label for="password" class="block text-base font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="Minimal 6 karakter" required>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-base font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                        placeholder="Ulangi password" required>
                </div>
            </div>

            <button type="submit"
                class="w-full mt-6 bg-green-700 text-white font-bold py-3 rounded-full shadow-lg hover:bg-green-800 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 flex items-center justify-center">
                Daftar Sekarang
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM12 14v.01M12 18v.01M12 21v.01M9 19h6"></path></svg>
            </button>

            <p class="text-center text-base mt-6 text-gray-700">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-green-800 font-bold hover:underline transition duration-200">Login di sini</a>
            </p>
        </form>
    </div>

</body>
</html>