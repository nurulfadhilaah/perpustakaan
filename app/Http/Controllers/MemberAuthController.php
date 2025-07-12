<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'nik'          => 'required|string|max:20|unique:members',
            // 'no_anggota'   => 'required|string|max:20|unique:members',
            'alamat'       => 'required|string',
            'no_hp'        => 'required|string|max:15',
            'email'        => 'required|email|unique:members',
            'tgl_lahir'    => 'required|date',
            'password'     => 'required|string|min:6|confirmed',
            'foto'         => 'nullable|image|max:20480', // tambahkan validasi
            'ktp'          => 'nullable|image|max:20480',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_member', 'public');
            $validated['foto'] = $fotoPath;
        }

        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('ktp_member', 'public');
            $validated['ktp'] = $ktpPath;
        }


        Member::create($validated);

        return redirect('/login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }
}
