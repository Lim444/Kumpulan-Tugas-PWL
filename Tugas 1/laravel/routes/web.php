<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dosen', DosenController::class)->parameters(['dosen' => 'dosen']);
Route::resource('mahasiswa', MahasiswaController::class)->parameters(['mahasiswa' => 'mahasiswa']);
Route::resource('matakuliah', MatakuliahController::class)->parameters(['matakuliah' => 'matakuliah']);
Route::resource('krs', KrsController::class);
Route::resource('jadwal', JadwalController::class);

