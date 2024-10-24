<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;

Route::get('/kelas/tanpaSiswa', [KelasController::class, 'kelasTanpaSiswa'])->name('kelas.kelasTanpaSiswa');

Route::resource('siswas', SiswaController::class);
Route::resource('kelas', KelasController::class)->parameters([
    'kelas' => 'kelas'
]);

Route::get('/', function () {
    return view('welcome');
});
