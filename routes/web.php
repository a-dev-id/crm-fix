<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\Admin\VillaController;
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

// Admin
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('/', DashboardController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('guest', GuestController::class);
    Route::resource('room', VillaController::class);
});

require __DIR__ . '/auth.php';
