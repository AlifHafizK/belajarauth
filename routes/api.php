<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
Route::resource('siswa', SiswaController::class);
});
// Route::post('/siswa', [SiswaController::class, 'store']);
// Route::get('/siswa', [SiswaController::class, 'index']);
// Route::put('/siswa/{id}', [SiswaController::class, 'update']);
// Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);
// Route::resource('siswa', SiswaController::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
