@extends('layouts.member')

@section('title', 'Reset Password')

@section('content')
<div class="max-w-md mx-auto bg-white shadow-lg rounded-2xl p-8 mt-10" data-aos="fade-up">
    <h2 class="text-2xl font-bold text-green-800 text-center mb-6">Reset Password</h2>

    <form method="POST" action="{{ route('forgot.reset') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
            @error('email')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-gray-700 font-medium mb-1">Password Baru</label>
            <input type="password" name="password" id="password" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
            @error('password')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
        </div>

        <button type="submit" class="w-full bg-green-700 text-white font-semibold py-2 rounded-lg hover:bg-green-800 transition duration-300">
            Simpan Password Baru
        </button>
    </form>
</div>
@endsection
