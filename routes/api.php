<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;

Route::get('/user', function () {
    return response()->json([
        'nama' => 'Hafiz',
        'kelas' => 'XI RPL',
        'umur' => 16
    ]);
});

// Route::post('/siswa', [SiswaController::class, 'store']);
// Route::get('/siswa', [SiswaController::class, 'index']);
// Route::put('/siswa/{id}', [SiswaController::class, 'update']);
// Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);
Route::resource('siswa', SiswaController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
