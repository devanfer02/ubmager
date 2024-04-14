<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PageController;

Route::controller(PageController::class)->group(function() {
    Route::get('/', 'index');
});

Route::controller(OrderController::class)->group(function() {
    Route::get('orders/my', 'index')->name('orders.my')->middleware('ubauth:mahasiswa');
    Route::get('orders/create', 'create')->middleware('ubauth:mahasiswa');
    Route::get('orders/{order}', 'show')->name('orders.show')->middleware('ubauth:mahasiswa,driver');
    Route::get('orders/edit/{order}', 'edit')->name('orders.edit')->middleware('ubauth:mahasiswa');

    Route::post('orders/create', 'store')->name('orders.create')->middleware('ubauth:mahasiswa');
    Route::put('orders/edit/{order}', 'update')->name('orders.update')->middleware('ubauth:mahasiswa');
    Route::delete('orders/delete/{order}', 'destroy')->name('orders.delete')->middleware('ubauth:mahasiswa');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('auth/customer/login', 'customerLoginView')->middleware('guest:mahasiswa,driver');
    Route::get('auth/driver/login', 'driverLoginView')->middleware('guest:mahasiswa,driver');
    Route::get('auth/driver/register', 'driverRegisterView')->middleware('guest:mahasiswa,driver');

    Route::post('auth/customer/login', 'customerAuth')->name('customer.login');
    Route::post('auth/customer/logout', 'customerLogout')->name('customer.logout');
});

Route::controller(MahasiswaController::class)->group(function() {
    Route::get('customer/profile', 'index')->name('customer.profile')->middleware('ubauth:mahasiswa');
    Route::get('customer/profile/{mahasiswa}', 'show')->name('customer.profile.guest');
});

