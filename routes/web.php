<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ClienteleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/listing-admin', [MainController::class, 'listing_admin_login'])->middleware(['auth', 'verified'])->name('listing.admin.login');

Route::get('/financial-admin', [MainController::class, 'financial_admin_login'])->middleware(['auth', 'verified'])->name('financial.admin.login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('projects', ProjectController::class);
    Route::resource('units', UnitController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('clienteles', ClienteleController::class);
    Route::resource('meetings', MeetingController::class);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout.get');
});

require __DIR__.'/auth.php';
