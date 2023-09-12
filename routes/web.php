<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\Admin\VillaController;
use App\Http\Controllers\Front\CreditCardController;
use App\Http\Controllers\Front\GuestDetailController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PassportController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Front
// Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Route::get('/{token}', [HomeController::class, 'show'])->name('home.show');
// Route::get('/guests/{id}', [HomeController::class, 'edit'])->name('tamu.edit');

Route::get('/', function () {
    return redirect()->route('check-in.index');
});
Route::resource('/check-in', HomeController::class);
Route::resource('/check-in/guest-detail', GuestDetailController::class);
Route::resource('/check-in/upload-passport', PassportController::class);
Route::resource('/check-in/upload-credit-card', CreditCardController::class);

// Admin
Route::middleware('auth')->prefix('panel/admin')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('guest', GuestController::class);
    Route::resource('room', VillaController::class);
    Route::resource('experience', ExperienceController::class);
});

require __DIR__ . '/auth.php';
