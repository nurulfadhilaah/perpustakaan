{{-- resources/views/auth/forgot-password.blade.php --}}
@extends('layouts.member')

@section('title', 'Lupa Password')

@section('content')
<div class="max-w-md mx-auto bg-white shadow-md p-8 rounded-lg mt-12">
    <h2 class="text-2xl font-bold text-green-700 text-center mb-6">Lupa Password</h2>

    {{-- Tampilkan error jika ada --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <form action="{{ route('forgot.check') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" name="email" id="email"
                   value="{{ old('email', $email ?? '') }}"
                   {{ isset($step) && $step === 'verify' ? 'readonly' : '' }}
                   class="w-full rounded-md border-gray-300 focus:ring-green-500 focus:border-green-500 bg-white {{ isset($step) && $step === 'verify' ? 'bg-gray-100' : '' }}"
                   required>
        </div>

        {{-- Hidden step info --}}
        @if(isset($step) && $step === 'verify')
            <input type="hidden" name="step" value="verify">

            {{-- Pertanyaan Keamanan --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Pertanyaan Keamanan</label>
                <input type="text" value="{{ $pertanyaan }}" readonly class="w-full bg-gray-100 rounded-md border-gray-300 text-gray-700">
            </div>

            {{-- Jawaban --}}
            <div>
                <label for="jawaban" class="block text-gray-700 font-medium mb-1">Jawaban</label>
                <input type="text" name="jawaban" id="jawaban" required class="w-full rounded-md border-gray-300 focus:ring-green-500 focus:border-green-500">
            </div>
        @endif

        <button type="submit" class="w-full bg-green-700 text-white py-2 rounded-md hover:bg-green-800 transition">
            {{ isset($step) && $step === 'verify' ? 'Verifikasi' : 'Lanjutkan' }}
        </button>
    </form>
</div>
@endsection
