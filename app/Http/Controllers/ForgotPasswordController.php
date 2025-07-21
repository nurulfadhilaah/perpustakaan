<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'jawaban' => 'nullable|string',
        ]);

        $member = Member::where('email', $request->email)->first();

        if (!$member) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }

        // Langkah awal: hanya isi email
        if (!$request->filled('step')) {
            return view('auth.forgot-password', [
                'email' => $member->email,
                'pertanyaan' => $member->pertanyaan_keamanan,
                'step' => 'verify',
            ]);
        }

        // Langkah verifikasi jawaban
        if (strtolower(trim($request->jawaban)) !== strtolower(trim($member->jawaban_keamanan))) {
            return back('auth.forgot-password', [
                'email' => $member->email,
                'pertanyaan' => $member->pertanyaan_keamanan,
                'step' => 'verify',
            ])->withErrors(['jawaban' => 'Jawaban salah.']);
        }

        // Jawaban benar: tampilkan form reset password
        return view('auth.reset-password', [
            'email' => $member->email,
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:members,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $member = \App\Models\Member::where('email', $request->email)->first();
        $member->password = bcrypt($request->password);
        $member->save();

        // Langsung login member
        // Auth::guard('member')->login($member);

        return redirect()->route('universal.login')->with('success', 'Password berhasil direset. Silakan login dengan password baru Anda.');
    }


}
