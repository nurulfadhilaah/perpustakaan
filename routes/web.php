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
use App\Models\Loan;
use App\Models\BookReturn;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\ReportExportController;
use App\Http\Controllers\LandingKatalogController;

Route::get('/', function () {
    return view('landing.index');
});

Route::view('/tentang', 'landing.tentang')->name('tentang');

Route::get('/katalog', [LandingKatalogController::class, 'index']);

Route::get('/kontak', function () {
    return view('landing.kontak');
})->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

//login
Route::get('/login', [AuthController::class, 'showUniversalLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'universalLogin'])->name('universal.login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//register
Route::get('/register', [MemberAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [MemberAuthController::class, 'register']);

// DASHBOARD UTAMA
Route::get('/anggota/dashboard', function () {
    return view('member.dashboard');
})->middleware('auth:member')->name('member.dashboard');

// PROFIL
Route::get('/anggota/profil', function () {
    $member = Auth::guard('member')->user();
    return view('member.profil', compact('member'));
})->middleware('auth:member')->name('member.profil');


Route::middleware('auth:member')->prefix('anggota')->name('member.')->group(function () {
    Route::get('/dashboard', fn() => view('member.dashboard'))->name('dashboard');
    Route::get('/profil', [MemberController::class, 'profil'])->name('profil');
    Route::get('/profil/edit', [MemberController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/update', [MemberController::class, 'update'])->name('profil.update'); 
    Route::get('/kartu', [MemberController::class, 'cetakKartu'])->name('kartu');
    Route::get('/katalog', fn() => view('member.katalog'))->name('katalog');
    Route::get('/riwayat', fn() => view('member.riwayat'))->name('riwayat');
});


// KATALOG BUKU
Route::get('/anggota/katalog', function () {
    $books = Book::all();
    return view('member.katalog', compact('books'));
})->middleware('auth:member')->name('member.katalog');

// RIWAYAT PEMINJAMAN & PENGEMBALIAN
Route::middleware('auth:member')->group(function () {
    Route::get('/riwayat', [MemberRiwayatController::class, 'index'])->name('member.riwayat');
    Route::post('/riwayat/{loan}/ajukan-pengembalian', [MemberRiwayatController::class, 'ajukanPengembalian'])->name('member.riwayat.ajukan');
});

// LOGOUT
Route::post('/anggota/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->middleware('auth:member')
    ->name('member.logout');


//Cetak Kartu
Route::get('/anggota/cetak-kartu', function () {
    $member = Auth::guard('member')->user();
    return view('member.kartu', compact('member'));
})->middleware('auth:member')->name('member.cetak_kartu');

//book
Route::middleware('auth:member')->prefix('anggota')->group(function () {
    Route::get('/katalog', [BookController::class, 'index'])->name('member.katalog');
    Route::get('/buku/{id}', [BookController::class, 'show'])->name('member.buku.detail');
    Route::post('/buku/{id}/pinjam', [BookController::class, 'ajukanPinjam'])->name('member.peminjaman.ajukan');
});


Route::middleware('auth:member')->prefix('anggota')->group(function () {
    Route::get('/profil', [MemberController::class, 'profil'])->name('member.profil');
    Route::get('/edit-profil', [MemberController::class, 'edit'])->name('member.edit_profil');
    Route::post('/edit-profil', [MemberController::class, 'update'])->name('member.update_profil');
    Route::get('/cetak-kartu', [MemberController::class, 'cetakKartu'])->name('member.cetak_kartu');
});

//katalog
Route::get('/anggota/katalog', [MemberKatalogController::class, 'index'])->name('member.katalog');

//detail buku
Route::get('/anggota/buku/{id}', [MemberKatalogController::class, 'detail'])->name('member.buku.detail');
Route::get('/anggota/buku/{id}', [KatalogController::class, 'detail'])->name('member.buku.detail');

Route::middleware(['auth:member'])->group(function () {
    Route::post('/member/peminjaman/ajukan/{book}', [\App\Http\Controllers\MemberLoanController::class, 'ajukan'])
        ->name('member.peminjaman.ajukan');
});

//report
Route::get('/admin/report/download/pdf', [ReportExportController::class, 'exportPdf'])->name('report.download.pdf');





