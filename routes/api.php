<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\SubscriptionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login']);




Route::middleware('auth:sanctum')->group(function () {
    Route::post('bot/sub', [SubscriptionController::class, 'store']);
    Route::post('channel/sub', [SubscriptionController::class, 'subChannel']);
    Route::post('create/bot', [ChatBotController::class, 'store']);
    Route::post('create/channel', [ChannelController::class, 'store']);
    Route::get('subcribers', [SubscriptionController::class, 'index']);
});
