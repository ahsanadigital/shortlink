<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/debug', function() {
  dd(request()->getPort(), request()->getPort() == 80 OR request()->getPort() == 443);
});
Route::any('/statistic', [\App\Http\Controllers\HomeController::class, 'statistic'])->name('statistic');
