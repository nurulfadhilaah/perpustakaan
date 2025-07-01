<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class MemberController extends Controller
{
    // Menampilkan halaman profil
    public function profil()
    {
        $member = Auth::guard('member')->user();
        return view('member.profil', compact('member'));
    }

    // Menampilkan form edit profil
    public function edit()
    {
        $member = Auth::guard('member')->user();
        return view('member.edit', compact('member'));
    }

    // Proses update profil
    public function update(Request $request)
    {
        $member = Auth::guard('member')->user();

        $validated = $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'no_hp'        => 'nullable|string|max:15',
            'alamat'       => 'nullable|string',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password'     => 'nullable|string|min:6|confirmed',
        ]);

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($member->foto && Storage::disk('public')->exists($member->foto)) {
                Storage::disk('public')->delete($member->foto);
            }

            $validated['foto'] = $request->file('foto')->store('foto_member', 'public');
        }
        
         // Simpan KTP jika ada
        if ($request->hasFile('ktp')) {
            if ($member->ktp && Storage::disk('public')->exists($member->ktp)) {
                Storage::disk('public')->delete($member->ktp);
            }

            $validated['ktp'] = $request->file('ktp')->store('ktp_member', 'public');
        }

        // Ubah password jika diisi
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        /** @var \App\Models\Member $member */
        $member->update($validated);

        return redirect()->route('member.profil')->with('success', 'Profil berhasil diperbarui.');
    }

    // Cetak kartu anggota (contoh bisa jadi PDF)
    public function cetakKartu()
    {
        $member = Auth::guard('member')->user();

        // Sementara tampilkan view biasa, bisa diganti jadi PDF dengan dompdf
        return view('member.kartu', compact('member'));
    }
}
