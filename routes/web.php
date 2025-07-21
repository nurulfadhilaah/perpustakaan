<?php

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\MemberAuthController;
use App\Http\Controllers\Member\BookController;
use App\Http\Controllers\MemberKatalogController;
use App\Http\Controllers\MemberRiwayatController;
use App\Http\Controllers\ReportExportController;
use App\Http\Controllers\LandingKatalogController;
use App\Http\Controllers\MemberLoanController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ExportBookCopyReportController;


// PUBLIC ROUTES (TANPA LOGIN)


Route::get('/', fn() => view('landing.index'));

Route::view('/tentang', 'landing.tentang')->name('tentang');
Route::get('/katalog', [LandingKatalogController::class, 'index']);
Route::view('/kontak', 'landing.kontak')->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

// Login & Register
Route::get('/login', [AuthController::class, 'showUniversalLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'universalLogin'])->name('universal.login');
Route::get('/register', [MemberAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [MemberAuthController::class, 'register']);

// MEMBER ROUTES (HARUS LOGIN)


Route::middleware('auth:member')->prefix('anggota')->name('member.')->group(function () {
    // Dashboard
    Route::get('/dashboard', fn() => view('member.dashboard'))->name('dashboard');

    // Profil
    Route::get('/profil', [MemberController::class, 'profil'])->name('profil');
    Route::get('/profil/edit', [MemberController::class, 'edit'])->name('edit_profil');
    Route::put('/profil/update', [MemberController::class, 'update'])->name('update_profil');

    // Cetak Kartu
    Route::get('/cetak-kartu', [MemberController::class, 'cetakKartu'])->name('cetak_kartu');

    // Katalog & Detail Buku
    Route::get('/katalog', [MemberKatalogController::class, 'index'])->name('katalog');
    Route::get('/buku/{id}', [MemberKatalogController::class, 'detail'])->name('buku.detail');

    // Peminjaman
    Route::post('/buku/{id}/pinjam', [MemberLoanController::class, 'ajukan'])->name('peminjaman.ajukan');

    // Riwayat Peminjaman
    Route::get('/riwayat', [MemberRiwayatController::class, 'index'])->name('riwayat');
    Route::post('/riwayat/{loan}/ajukan-pengembalian', [MemberRiwayatController::class, 'ajukanPengembalian'])->name('riwayat.ajukan');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/lupa-password', [ForgotPasswordController::class, 'showForm'])->name('forgot.form');
Route::post('/lupa-password', [ForgotPasswordController::class, 'check'])->name('forgot.check');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('forgot.reset');


// ADMIN EXPORT PDF REPORT

Route::get('/admin/report/download/pdf', [ReportExportController::class, 'exportPdf'])->name('report.download.pdf');

Route::get('/report/book-copies/export', [ExportBookCopyReportController::class, 'export'])->name('book-copies.export');


