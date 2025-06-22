<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Perpustakaan Mandailing Natal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-6 rounded shadow w-full max-w-md">
    <h2 class="text-2xl font-bold mb-4 text-center text-green-900">Login</h2>
    
    @if ($errors->any())
      <div class="mb-4 text-red-600 text-sm">
        {{ $errors->first() }}
      </div>
    @endif

    @if (session('success'))
      <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        x-transition
        class="mb-4 px-4 py-3 border border-green-400 text-green-800 bg-green-100 rounded text-sm"
      >
        {{ session('success') }}
      </div>
    @endif

     @if ($errors->any())
      <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 5000)" 
        x-show="show"
        x-transition
        class="mb-4 px-4 py-3 border border-red-400 text-red-800 bg-red-100 rounded text-sm"
      >
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif


    <form method="POST" action="{{ route('login') }}" class="space-y-4">
      @csrf
      <div>
        <label for="email" class="block text-sm">Email</label>
        <input type="email" name="email" id="email" class="w-full border px-3 py-2 rounded" required>
      </div>
      <div>
        <label for="password" class="block text-sm">Password</label>
        <input type="password" name="password" id="password" class="w-full border px-3 py-2 rounded" required>
      </div>
      <div class="flex justify-between items-center">
        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Login</button>
        <a href="/" class="text-sm text-green-700 hover:underline">Kembali</a>
      </div>

    </form>
  </div>
</body>
</html>
