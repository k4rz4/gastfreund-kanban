<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('users/login', 'App\Http\Controllers\ApiGatewayController@login');

Route::middleware(['throttle:60,1', 'jwt.auth'])->group(function () {
    Route::any('{any}', 'App\Http\Controllers\ApiGatewayController')->where('any', '.*');
});

Route::get('/health', function() {
    return response()->json(['status' => 'healthy'], 200);
});