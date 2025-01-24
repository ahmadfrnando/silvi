<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'statistikPenduduk' => \App\Models\StatistikPenduduk::first(),
        'berita' => \App\Models\Berita::take(3)->get()
    ]);
});
Route::get('/detail/{berita}', function (\App\Models\Berita $berita) {
    return view('detail-berita', [
        'berita' => $berita
    ]);
})->name('detail-berita');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Tambahkan rute berikut

    Route::resource('aset', \App\Http\Controllers\AsetController::class);
    Route::resource('jenis-barang', \App\Http\Controllers\JenisBarangController::class);
    Route::resource('merk', \App\Http\Controllers\MerkController::class);
    Route::resource('berita', \App\Http\Controllers\BeritaController::class);
    Route::resource('statistik-penduduk', \App\Http\Controllers\StatistikPendudukController::class);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/laporan', [\App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export-pdf', [\App\Http\Controllers\LaporanController::class, 'exportPdf'])->name('laporan.exportPdf');
    Route::get('/laporan/export-excel', [\App\Http\Controllers\LaporanController::class, 'exportExcel'])->name('laporan.exportExcel');

});

require __DIR__ . '/auth.php';
