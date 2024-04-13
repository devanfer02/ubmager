<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    $pageTitle = "UB Mager";

    return view('home', compact('pageTitle'));
});

Route::controller(OrderController::class)->group(function() {
    Route::get('orders/my', 'index')->middleware('ubauth:mahasiswa');
    Route::get('orders/create', 'create')->middleware('ubauth:mahasiswa');
    Route::get('orders/{order}', 'show')->middleware('ubauth:mahasiswa,driver');

    Route::post('orders/create', 'store')->name('orders.create')->middleware('ubauth:mahasiswa');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('auth/customer/login', 'customerLoginView')->middleware('guest:mahasiswa');
    Route::get('auth/driver/login', 'driverLoginView');
    Route::get('auth/driver/register', 'driverRegisterView');

    Route::post('auth/customer/login', 'customerAuth')->name('customer.login');
    Route::post('auth/customer/logout', 'customerLogout')->name('customer.logout');
});

Route::controller(MahasiswaController::class)->group(function() {
    Route::get('customer/profile', 'index')->middleware('ubauth:mahasiswa');
});

