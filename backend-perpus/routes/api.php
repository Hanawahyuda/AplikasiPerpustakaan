<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamBukuController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserPinjamController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* USER ADMIN */
Route::post('login', [UserAdminController::class, 'login']);
Route::post('user_admin', [UserAdminController::class, 'buat_user']);
Route::get('user_admin', [UserAdminController::class, 'semua_data_user']);
Route::delete('user_admin/{parameter}', [UserAdminController::class, 'hapus_user']);
Route::post('user_admin_update', [UserAdminController::class, 'ubah_user']);

/* USER PINJAM */
Route::post('login_peminjam', [UserPinjamController::class, 'login']);
Route::post('user_peminjam', [UserPinjamController::class, 'buat_user']);
Route::get('user_peminjam', [UserPinjamController::class, 'semua_data_user']);
Route::delete('user_peminjam/{parameter}', [UserPinjamController::class, 'hapus_user']);
Route::post('user_peminjam_update', [UserPinjamController::class, 'ubah_user']);

/* BUKU */
Route::post('buku', [BukuController::class, 'buat_buku']);
Route::get('buku', [BukuController::class, 'semua_data_buku']);
Route::delete('buku/{parameter}', [BukuController::class, 'hapus_buku']);
Route::post('buku_update', [BukuController::class, 'ubah_buku']);

/* PINJAM BUKU */
Route::post('peminjam_token', [PinjamBukuController::class, 'token_peminjam_buku']);
Route::post('peminjam_buku', [PinjamBukuController::class, 'buat_pinjam_buku']);
Route::get('peminjam_buku', [PinjamBukuController::class, 'semua_data_peminjam_buku']);
Route::delete('peminjam_buku/{parameter}', [PinjamBukuController::class, 'hapus_pinjam_buku']);
Route::post('peminjam_buku_update', [PinjamBukuController::class, 'ubah_pinjam_buku']);