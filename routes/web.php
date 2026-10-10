
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route sederhana
Route::get('/halo/{nama}', function (string $nama) {
    return "Halo, {$nama}! Selamat datang di praktikum Laravel.";
});

// Route parameter opsional
Route::get('/kampus/{nama?}', function (string $nama = 'Universitas') {
    return "Selamat datang di {$nama}";
});

// Route ke controller
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
    ->middleware('log.request');

Route::get('/mahasiswa/create/form', [MahasiswaController::class, 'create']);

Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']);

// Route POST untuk menerima data mahasiswa
Route::post('/mahasiswa', function (Request $request) {
    return response()->json([
        'message' => 'Data mahasiswa berhasil diterima',
        'data' => [
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'jurusan' => $request->input('jurusan'),
        ]
    ]);
});

// Route dengan dua parameter (letakkan di bawah)
Route::get('/mahasiswa/{nim}/{nama}', function (string $nim, string $nama) {
    return "NIM: {$nim} | Nama: {$nama}";
});
