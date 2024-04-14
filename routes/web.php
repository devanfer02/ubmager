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

Route::prefix('orders/')->controller(OrderController::class)->group( function() {

    Route::middleware('ubauth:mahasiswa')->group( function() {
        Route::get('my', 'index')->name('orders.my');
        Route::get('create', 'create');
        Route::get('edit/{order}', 'edit')->name('orders.edit');

        Route::post('create', 'store')->name('orders.create');
        Route::put('edit/{order}', 'update')->name('orders.update');
        Route::delete('delete/{order}', 'destroy')->name('orders.delete');
    });

    Route::middleware('ubauth:driver')->group( function() {
        Route::get('list', 'index')->name('orders.list');
    });

    Route::middleware('ubauth:mahasiswa,driver')->group( function() {
        Route::get('{order}', 'show')->name('orders.show');
    });


});

Route::prefix('auth/')->controller(AuthController::class)->group(function() {
    Route::middleware('guest:mahasiswa,driver')->group( function() {
        Route::get('customer/login', 'customerLoginView');
        Route::get('driver/login', 'driverLoginView');
        Route::get('driver/register', 'driverRegisterView');
        Route::post('customer/login', 'customerAuth')->name('customer.login');
    });


    Route::post('customer/logout', 'customerLogout')->name('customer.logout')->middleware('ubauth:mahasiswa');
});

Route::prefix('customer/')->controller(MahasiswaController::class)->group(function() {
    Route::get('profile', 'index')->name('customer.profile')->middleware('ubauth:mahasiswa');
    Route::get('profile/{mahasiswa}', 'show')->name('customer.profile.guest');
});

