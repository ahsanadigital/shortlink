<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware(['guest'])->group(function () {
  Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Route::post('/shorting', [\App\Http\Controllers\HomeController::class, 'shorting'])->name('shorting');
});

Route::get('{id}', [\App\Http\Controllers\HomeController::class, 'source'])->name('short-url');

// Route::get('/debug', function(\App\Models\Visitor $visit) {
//   dd(
//     $visit->get()->groupBy('id_link')
//   );
// });
