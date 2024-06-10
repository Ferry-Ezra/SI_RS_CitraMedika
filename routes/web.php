<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JenisKamarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PenggunaController;


use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\RawatInapController;
use App\Http\Controllers\RawatJalanController;
use App\Http\Controllers\TenagaKesehatanController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [DashboardController::class,'index'])->name('home');


//Routing untuk menampilkan halaman dokter
Route::get('/dokter',[DokterController::class, 'index'])->name('dokter');
//Routing untuk menampilkan halaman tambah data dokter
Route::get('/dokter-entry',[DokterController::class, 'create'])->name('dokter-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/dokter-store',[DokterController::class, 'store'])->name('dokter-store');
//Routing untuk melakukan update data dalam database
Route::post('/dokter-update/{id}',[DokterController::class, 'update'])->name('dokter-update');
//Routing untuk melakukan delete data dalam database
Route::get('/dokter-delete/{id}',[DokterController::class, 'destroy'])->name('dokter-delete');

//Routing untuk menampilkan halaman pasien
Route::get('/pasien',[PasienController::class, 'index'])->name('pasien');
//Routing untuk menampilkan halaman tambah data pasien
Route::get('/pasien-entry',[PasienController::class, 'create'])->name('pasien-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/pasien-store',[PasienController::class, 'store'])->name('pasien-store');
//Routing untuk melakukan update data dalam database
Route::post('/pasien-update/{id}',[PasienController::class, 'update'])->name('pasien-update');
//Routing untuk melakukan delete data dalam database
Route::get('/pasien-delete/{id}',[PasienController::class, 'destroy'])->name('pasien-delete');

//Routing untuk menampilkan halaman obat
Route::get('/obat',[ObatController::class, 'index'])->name('obat');
//Routing untuk menampilkan halaman tambah data obat
Route::get('/obat-entry',[ObatController::class, 'create'])->name('obat-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/obat-store',[ObatController::class, 'store'])->name('obat-store');
//Routing untuk melakukan update data dalam database
Route::post('/obat-update/{id}',[ObatController::class, 'update'])->name('obat-update');
//Routing untuk melakukan delete data dalam database
Route::get('/obat-delete/{id}',[ObatController::class, 'destroy'])->name('obat-delete');

//Routing untuk menampilkan halaman tenaga-kesehatan
Route::get('/tenaga-kesehatan',[TenagaKesehatanController::class, 'index'])->name('tenaga-kesehatan');
//Routing untuk menampilkan halaman tambah data tenaga-kesehatan
Route::get('/tenaga-kesehatan-entry',[TenagaKesehatanController::class, 'create'])->name('tenaga-kesehatan-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/tenaga-kesehatan-store',[TenagaKesehatanController::class, 'store'])->name('tenaga-kesehatan-store');
//Routing untuk melakukan update data dalam database
Route::post('/tenaga-kesehatan-update/{id}',[TenagaKesehatanController::class, 'update'])->name('tenaga-kesehatan-update');
//Routing untuk melakukan delete data dalam database
Route::get('/tenaga-kesehatan-delete/{id}',[TenagaKesehatanController::class, 'destroy'])->name('tenaga-kesehatan-delete');

//Routing untuk menampilkan halaman kamar
Route::get('/kamar',[KamarController::class, 'index'])->name('kamar');
//Routing untuk menampilkan halaman tambah data kamar
Route::get('/kamar-entry',[KamarController::class, 'create'])->name('kamar-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/kamar-store',[KamarController::class, 'store'])->name('kamar-store');
//Routing untuk melakukan update data dalam database
Route::post('/kamar-update/{id}',[KamarController::class, 'update'])->name('kamar-update');
//Routing untuk melakukan delete data dalam database
Route::get('/kamar-delete/{id}',[KamarController::class, 'destroy'])->name('kamar-delete');

//Routing untuk menampilkan halaman jenis_kamar
Route::get('/jenis-kamar',[JenisKamarController::class, 'index'])->name('jenis-kamar');
//Routing untuk menampilkan halaman tambah data jenis-kamar
Route::get('/jenis-kamar-entry',[JenisKamarController::class, 'create'])->name('jenis-kamar-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/jenis-kamar-store',[JenisKamarController::class, 'store'])->name('jenis-kamar-store');
//Routing untuk melakukan update data dalam database
Route::post('/jenis-kamar-update/{id}',[JenisKamarController::class, 'update'])->name('jenis-kamar-update');
//Routing untuk melakukan delete data dalam database
Route::get('/jenis-kamar-delete/{id}',[JenisKamarController::class, 'destroy'])->name('jenis-kamar-delete');

//Routing untuk menampilkan halaman rawat-jalan
Route::get('/rawat-jalan',[RawatJalanController::class, 'index'])->name('rawat-jalan');
//Routing untuk menampilkan halaman tambah data rawat-jalan
Route::get('/rawat-jalan-entry',[RawatJalanController::class, 'create'])->name('rawat-jalan-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/rawat-jalan-store',[RawatJalanController::class, 'store'])->name('rawat-jalan-store');
//Routing untuk melakukan update data dalam database
Route::post('/rawat-jalan-update/{id}',[RawatJalanController::class, 'update'])->name('rawat-jalan-update');
//Routing untuk melakukan delete data dalam database
Route::get('/rawat-jalan-delete/{id}',[RawatJalanController::class, 'destroy'])->name('rawat-jalan-delete');

//Routing untuk menampilkan halaman rawat-inap
Route::get('/rawat-inap',[RawatInapController::class, 'index'])->name('rawat-inap');
//Routing untuk menampilkan halaman tambah data rawat-inap
Route::get('/rawat-inap-entry',[RawatInapController::class, 'create'])->name('rawat-inap-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/rawat-inap-store',[RawatInapController::class, 'store'])->name('rawat-inap-store');
//Routing untuk melakukan update data dalam database
Route::post('/rawat-inap-update/{id}',[RawatInapController::class, 'update'])->name('rawat-inap-update');
//Routing untuk melakukan delete data dalam database
Route::get('/rawat-inap-delete/{id}',[RawatInapController::class, 'destroy'])->name('rawat-inap-delete');

//Routing untuk menampilkan halaman pembayaran
Route::get('/pembayaran',[PembayaranController::class, 'index'])->name('pembayaran');
//Routing untuk menampilkan halaman tambah data pembayaran
Route::get('/pembayaran-entry',[PembayaranController::class, 'create'])->name('pembayaran-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/pembayaran-store',[PembayaranController::class, 'store'])->name('pembayaran-store');
//Routing untuk melakukan update data dalam database
Route::post('/pembayaran-update/{id}',[PembayaranController::class, 'update'])->name('pembayaran-update');
//Routing untuk melakukan delete data dalam database
Route::get('/pembayaran-delete/{id}',[PembayaranController::class, 'destroy'])->name('pembayaran-delete');

//Routing untuk menampilkan halaman perawatan
Route::get('/perawatan',[PerawatanController::class, 'index'])->name('perawatan');
//Routing untuk menampilkan halaman tambah data perawatan
Route::get('/perawatan-entry',[PerawatanController::class, 'create'])->name('perawatan-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/perawatan-store',[PerawatanController::class, 'store'])->name('perawatan-store');
//Routing untuk melakukan update data dalam database
Route::post('/perawatan-update/{id}',[PerawatanController::class, 'update'])->name('perawatan-update');
//Routing untuk melakukan delete data dalam database
Route::get('/perawatan-delete/{id}',[PerawatanController::class, 'destroy'])->name('perawatan-delete');

//Routing untuk menampilkan halaman pemeriksaan
Route::get('/pemeriksaan',[PemeriksaanController::class, 'index'])->name('pemeriksaan');
//Routing untuk menampilkan halaman tambah data pemeriksaan
Route::get('/pemeriksaan-entry',[PemeriksaanController::class, 'create'])->name('pemeriksaan-entry');
//Routing untuk melakukan tambah data ke dalam database
Route::post('/pemeriksaan-store',[PemeriksaanController::class, 'store'])->name('pemeriksaan-store');
//Routing untuk melakukan update data dalam database
Route::post('/pemeriksaan-update/{id}',[PemeriksaanController::class, 'update'])->name('pemeriksaan-update');
//Routing untuk melakukan delete data dalam database
Route::get('/pemeriksaan-delete/{id}',[PemeriksaanController::class, 'destroy'])->name('pemeriksaan-delete');

//Routing untuk report
Route::get('/dokter-report',[DokterController::class, 'cetak'])->name('dokter-report');
Route::get('/jenis-kamar-report',[JenisKamarController::class, 'cetak'])->name('jenis-kamar-report');
Route::get('/kamar-report',[KamarController::class, 'cetak'])->name('kamar-report');
Route::get('/tenaga-kesehatan-report',[TenagaKesehatanController::class, 'cetak'])->name('tenaga-kesehatan-report');
Route::get('/obat-report',[ObatController::class, 'cetak'])->name('obat-report');
Route::get('/pasien-report',[PasienController::class, 'cetak'])->name('pasien-report');
Route::get('/pembayaran-report',[PembayaranController::class, 'cetak'])->name('pembayaran-report');
Route::get('/pemeriksaan-report',[PemeriksaanController::class, 'cetak'])->name('pemeriksaan-report');
Route::get('/perawatan-report',[PerawatanController::class, 'cetak'])->name('perawatan-report');
Route::get('/rawat-inap-report',[RawatInapController::class, 'cetak'])->name('rawat-inap-report');
Route::get('/rawat-jalan-report',[RawatJalanController::class, 'cetak'])->name('rawat-jalan-report');