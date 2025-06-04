<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Guest\BeritaController as GuestBeritaController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Tambahkan use controller yang kamu pakai di route
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AsetController;
use App\Http\Controllers\Admin\JenisBarangController;
use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\StatistikPendudukController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Superadmin\DashboardController as SuperDashboardController;
use App\Http\Controllers\Superadmin\ProfileController as SuperProfileController;
use App\Http\Controllers\Superadmin\AsetController as SuperAsetController;
use App\Http\Controllers\Superadmin\MerkController as SuperMerkController;
use App\Http\Controllers\Superadmin\JenisController as SuperJenisController;
use App\Http\Controllers\Superadmin\UserController as SuperUserController;
use App\Http\Controllers\Superadmin\LaporanController as SuperLaporanController;

Route::get('/', function () {
    return view('guest.home', [
        'statistikPenduduk' => \App\Models\StatistikPenduduk::first(),
        'berita' => \App\Models\Berita::take(3)->get()
    ]);
});

Route::get('/detail/{id}', [GuestBeritaController::class, 'show'])->name('detail-berita');

Route::post('/logout', function () {
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout')->middleware('auth');

Route::get('/login', function (Request $request) {
    if (Auth::check()) {
        $user = Auth::user();
        // Redirect sesuai role
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role === 'super admin') {
            return redirect('/super-admin/dashboard/index');
        } else {
            return redirect('/login');
        }
    }
    return view('auth.login'); // tampilan login biasa kalau belum login
})->middleware('guest')->name('login');

// Group untuk admin, tanpa Route::namespace()
Route::middleware(['auth', 'checkrole:admin'])->name('admin.')->group(function () {
    Route::resource('admin/profile', ProfileController::class)->only('edit', 'update', 'destroy');
    Route::resource('admin/aset', AsetController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    Route::resource('admin/jenis-barang', JenisBarangController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    Route::resource('admin/merk', MerkController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    Route::resource('admin/berita', BeritaController::class)->only('index', 'create', 'show', 'store', 'edit', 'update', 'destroy');
    Route::resource('admin/statistik-penduduk', StatistikPendudukController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

// Group untuk superadmin tanpa Route::namespace()
Route::middleware(['auth', 'checkrole:super admin'])->name('super-admin.')->group(function () {
    Route::resource('super-admin/dashboard', SuperDashboardController::class)->only('index');
    Route::resource('super-admin/profile', SuperProfileController::class)->only('edit', 'update', 'destroy');
    Route::resource('super-admin/aset', SuperAsetController::class)->only('index');
    Route::resource('super-admin/merk', SuperMerkController::class)->only('index');
    Route::resource('super-admin/jenis', SuperJenisController::class)->only('index');
    Route::resource('super-admin/user', SuperUserController::class);
    Route::resource('super-admin/laporan', SuperLaporanController::class)->only('index', 'store', 'create','destroy');
    // Route::get('super-admin/laporan/export-pdf', [SuperLaporanController::class, 'exportPdf'])->name('laporan.exportPdf');
    // Route::get('super-admin/laporan/export-excel', [SuperLaporanController::class, 'exportExcel'])->name('laporan.exportExcel');
});

Route::get('user/data', [\App\Http\Controllers\Superadmin\UserController::class, 'getData'])->name('user.data');
Route::get('ajax-load/list-merk', [\App\Http\Controllers\AjaxLoadController::class, 'listMerk'])->name('ajax-load.merk');
Route::get('ajax-load/list-jenis', [\App\Http\Controllers\AjaxLoadController::class, 'listJenis'])->name('ajax-load.jenis');

require __DIR__ . '/auth.php';
