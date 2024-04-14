<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PageController;

Route::controller(PageController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/faq', 'faq');
});

Route::controller(OrderController::class)->group(function() {

    Route::get('orders/{order}', 'show')->name('orders.show')->middleware('ubauth:mahasiswa,driver');

    Route::middleware('ubauth:mahasiswa')->group(function() {
        Route::get('orders/my', 'index')->name('orders.my')->middleware('ubauth:mahasiswa');
        Route::get('orders/create', 'create')->middleware('ubauth:mahasiswa');

        Route::get('orders/edit/{order}', 'edit')->name('orders.edit')->middleware('ubauth:mahasiswa');
        Route::post('orders/create', 'store')->name('orders.create');
        Route::put('orders/edit/{order}', 'update')->name('orders.update');
        Route::delete('orders/delete/{order}', 'destroy')->name('orders.delete');
    });

    Route::middleware('ubauth:driver')->group(function() {
        Route::get('orders/list', 'index')->name('orders.list')->middleware('ubauth:driver');
    });

});

Route::controller(AuthController::class)->middleware('guest:mahasiswa,driver')->group(function() {
    Route::get('auth/customer/login', 'customerLoginView');
    Route::get('auth/driver/login', 'driverLoginView');
    Route::get('auth/driver/register', 'driverRegisterView');

    Route::post('auth/customer/login', 'customerAuth')->name('customer.login');
    Route::post('auth/customer/logout', 'customerLogout')->name('customer.logout');
});

Route::controller(MahasiswaController::class)->group(function() {
    Route::get('customer/profile', 'index')->name('customer.profile')->middleware('ubauth:mahasiswa');
    Route::get('customer/profile/{mahasiswa}', 'show')->name('customer.profile.guest');
});

