<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pageTitle = "UB Mager";

    return view('home', compact('pageTitle'));
});

Route::get('/orders/my', function() {
    $pageTitle = 'My Orders';

    $orders = [
        [
            "order_id" => 1,
            'judul' => 'Joki Tugas Pemweb',
            'destinasi' => 'Onlen',
            'lokasi_jemput' => 'Onlen',
            'detail' => 'Info joki projek akhir pemweb, framework wajib laravel dari dosen katanya',
            'upah' => 10000,
            'username' => 'Anak FILKOM',
            'fakultas' => 'Fakultas Ilmu Komputer'
        ],
        [
            "order_id" => 2,
            'judul' => 'Antar ke Cafe',
            'destinasi' => 'Nakoa',
            'lokasi_jemput' => 'Suhat',
            'detail' => 'Tolong anterin gw ke nakoa dari suhat, sekarang woi ppp',
            'upah' => 5000,
            'username' => 'Anak FEB',
            'fakultas' => 'Fakultas Ekonomi Bisnis'
        ],
    ];

    return view('orders/user', compact('pageTitle', 'orders'));
});

Route::get('/orders/{id}', function($id) {
    return view('orders/detail');
});
