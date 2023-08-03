<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;




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
    return view('welcome');
});

// Route::get('/belajar', function(){
//     return view('belajar');
// });

// Route::get('/mempelajari', function(){
//     $nama = "Ahmad";
//     $kelas = "XI RPL 1";

//     return view('table', compact('nama','kelas'));
// });

// Route::get('/diajar', function(){
//     $tanggal = date('d');
//     $bulan = date('F');
//     $tahun = date('y');

//     return view('month', compact('tanggal', 'bulan', 'tahun'));
// });
Route::get('/belajar', [SiswaController::class, 'index']);

//studi kasus 1 
Route::get('/siswa', [SiswaController::class, 'siswa']);
Route::get('/month', [SiswaController::class, 'month']);
Route::get('/table', [SiswaController::class, 'table']);

//studi kasus 2 
Route::get('/kelas', [KelasController::class,'kelas']);

//sesi 25
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa', [SiswaController::class,'store']);

Route::get('/kelas/create', [KelasController::class, 'create']);
Route::post('/kelas', [KelasController::class,'store']);

//sesi 26
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
Route::patch('/siswa/{id}', [SiswaController::class, 'update']);
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);

Route::get('/kelas/{id}/edit', [KelasController::class, 'edit']);
Route::patch('/kelas/{id}', [KelasController::class, 'update']);
Route::delete('/kelas/{id}', [KelasController::class, 'destroy']);