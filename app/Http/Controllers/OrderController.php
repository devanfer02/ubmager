<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
