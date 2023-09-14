<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectBrochureController;
use App\Http\Controllers\ProjectImageController;

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
    Route::resource('project-brochures', ProjectBrochureController::class);
    Route::resource('project-images', ProjectImageController::class);
    Route::resource('units', UnitController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('clienteles', ClienteleController::class);
    Route::resource('meetings', MeetingController::class);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout.get');

    // PROJECT ROUTES
    Route::get('projects-drafts', [ProjectController::class, 'index_drafts'])->name('projects.drafts');
    Route::get('projects-trash', [ProjectController::class, 'index_trash'])->name('projects.trash');
    Route::get('projects-status-change/{id}/{status}', [ProjectController::class, 'status_change'])->name('projects.status.change');
    Route::post('project/connect-brochure', [ProjectController::class, 'project_connect_store'])->name('project.connect.brochure');
    Route::get('project/brochures/disconnect/{id}', [ProjectController::class, 'project_disconnect'])->name('project.disconnect.brochure');
    Route::get('project/images/disconnect/{id}', [ProjectController::class, 'project_image_disconnect'])->name('project.disconnect.image');

    Route::post('project-brochures/connect', [ProjectBrochureController::class, 'project_connect_store'])->name('project-brochures.connect');
    Route::get('project-brochures/disconnect/{id}', [ProjectBrochureController::class, 'project_disconnect'])->name('project-brochures.disconnect');
    Route::get('project-brochures/delete_all/{id}', [ProjectBrochureController::class, 'destroy_segment'])->name('project-brochures.destroy.segment');

    Route::post('project-images/connect', [ProjectImageController::class, 'project_connect_store'])->name('project-images.connect');
    Route::get('project-images/disconnect/{id}', [ProjectImageController::class, 'project_disconnect'])->name('project-images.disconnect');
    Route::get('project-images/delete_all/{id}', [ProjectImageController::class, 'destroy_segment'])->name('project-images.destroy.segment');
});

require __DIR__.'/auth.php';
