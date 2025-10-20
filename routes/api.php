<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ✅ مسارات تسجيل الدخول والتسجيل
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// اختبار بسيط للتأكد أن الـ API يعمل
Route::get('/test', function () {
    return response()->json(['message' => 'API is working ✅']);
});
