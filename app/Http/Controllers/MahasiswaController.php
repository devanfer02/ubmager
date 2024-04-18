<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Your Profile";

        $mahasiswa = Auth::guard('mahasiswa')->user()->load('orders');

        $orders = $mahasiswa['orders'];

        $availableOrders = $orders->where('selesai', false);
        $completedOrders = $orders->where('selesai', true);

        return view('customer/profile', compact('mahasiswa', 'pageTitle', 'availableOrders', 'completedOrders'));
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
    public function show(Mahasiswa $mahasiswa)
    {
        $pageTitle = $mahasiswa->nama_panggilan . " Profile";

        $mahasiswa = $mahasiswa->load('orders');

        $orders = $mahasiswa['orders'];

        $availableOrders = $orders->where('selesai', false);
        $completedOrders = $orders->where('selesai', true);

        return view('customer/profile', compact('mahasiswa', 'pageTitle', 'availableOrders', 'completedOrders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $pageTitle = 'Edit Profile';

        return view('customer/edit', compact('mahasiswa', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
