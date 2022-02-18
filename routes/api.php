<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Data
Route::group(['middleware' => 'auth:user'], function () {
    Route::get('/user', function(Request $req) {
        return response()->json([
            'user' => $req->user()
        ]);
    });
    Route::post('/new-password', [UserController::class, 'newPassword']);

    Route::get('/stok', [UserController::class, 'stok']);
    Route::get('/stok/{golongan}', [UserController::class, 'stokDetail']);

    Route::get('/jadwal', [UserController::class, 'jadwal']);
    Route::get('/chat', [UserController::class, 'chat']);
    Route::post('/chat', [UserController::class, 'chatSend']);
    Route::get('/chat/{user}/{admin}', [UserController::class, 'chatData']);

    Route::post('/daftar-pendonor', [UserController::class, 'daftarPendonor']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

// Validate Email
Route::get('/verify-email', function(Request $req) {
    if (User::where('email', $req->email)->first()) {
        return response()->json([
            'message' => 'Email sudah terdaftar.'
        ], 406);
    }
    return response()->json([
        'message' => 'Email bisa digunakan.'
    ], 200);
});
