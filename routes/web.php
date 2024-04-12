<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    $pageTitle = "UB Mager";

    return view('home', compact('pageTitle'));
});

Route::controller(OrderController::class)->group(function() {
    Route::get('orders/my', 'index');
    Route::get('orders/{order}', 'show');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('auth/customer/login', 'customerLoginView');
    Route::get('auth/driver/login', 'driverLoginView');
    Route::get('auth/driver/register', 'driverRegisterView');
});

