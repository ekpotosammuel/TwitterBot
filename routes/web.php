<?php

use App\Http\Controllers\BotController;
use App\Http\Controllers\SocialMediaController;
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
Route::get('/twitter/callback', [SocialMediaController::class, 'twitterCallback'])->name('twitter.callback');
Route::get('twitter', [SocialMediaController::class, 'twitterConnect'])->name('twitter.connect');
