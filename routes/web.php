<?php

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
    return view('welcome');
});

Route::get('/belajar', function(){
    return view('belajar');
});

Route::get('/mempelajari', function(){
    $nama = "Ahmad";
    $kelas = "XI RPL 1";

    return view('table', compact('nama','kelas'));
});

Route::get('/diajar', function(){
    $tanggal = date('d');
    $bulan = date('F');
    $tahun = date('y');

    return view('month', compact('tanggal', 'bulan', 'tahun'));
});