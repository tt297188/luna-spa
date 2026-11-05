<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingLookupController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\StatsController;

Route::get('/tra-cuu-lich-hen', [BookingLookupController::class, 'index'])
    ->name('booking.lookup');
Route::post('/tra-cuu-lich-hen', [BookingLookupController::class, 'search'])
    ->name('booking.search');

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
// Giới thiệu
Route::get('/gioi-thieu', function () {
    return view('gioi-thieu');
})->name('about');
// Dịch vụ
Route::get('/dich-vu', [HomeController::class, 'services'])
    ->name('services');
// Đặt lịch
Route::get('/dat-lich', [HomeController::class, 'booking'])
    ->name('booking');
// Liên hệ
Route::get('/lien-he', function () {
    return view('lien-he');
})->name('contact');
Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store');
// Quản trị Admin

Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])
    ->name('admin.authenticate');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');
Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->name('admin.logout');
 // Quản lý dịch vụ

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/services', [ServiceController::class, 'index'])
        ->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])
        ->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])
        ->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])
        ->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])
        ->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])
        ->name('services.destroy');
});

// QUẢN LÝ DANH MỤC
Route::get('/admin/categories', [CategoryController::class, 'index'])
    ->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])
    ->name('admin.categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])
    ->name('admin.categories.store');
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])
    ->name('admin.categories.edit');
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])
    ->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])
    ->name('admin.categories.destroy');
Route::get('/admin/customers', [CustomerController::class, 'index'])
    ->name('admin.customers.index');
Route::get('/admin/bookings', [AdminBookingController::class, 'index'])
    ->name('admin.bookings.index');
Route::put('/admin/bookings/{id}/status', [AdminBookingController::class, 'updateStatus'])
    ->name('admin.bookings.status');
Route::get('/admin/stats', [StatsController::class, 'index'])
    ->name('admin.stats.index');