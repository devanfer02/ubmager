<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::guard('mahasiswa')) {
            $pageTitle = 'My Orders';
            $user = Auth::guard('mahasiswa')->user();

            $orders = Order::with(['mahasiswa' => function($query) use($user) {
                $query->where('nim', '=', $user->nim);
            }])->get();

        } else {
            $orders = Order::with('mahasiswa')->get();
            $pageTitle = 'Available Orders';
        }

        return view('orders/list', compact('pageTitle', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Order';

        return view('orders/create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate($this->rules());

            $user = Auth::guard('mahasiswa')->user();

            $data = [...$data, 'customer_id' => $user->nim, 'order_id' => Uuid::uuid4()];

            Order::create($data);

            return redirect('orders/my')->with('success');

        } catch(\Exception $e) {
            error_log("Error: " . $e->getMessage());
            return redirect('orders/my')->with('failure', 'Failed to add order');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $pageTitle = $order->judul;
        return view('orders/detail', compact('order', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $pageTitle = "Edit " . $order->judul;
        return view('orders/edit', compact('order', 'pageTitle'));
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

    private function rules() {
        return [
            'judul' => 'required|min:3|max:255',
            'lokasi_jemput' => 'required',
            'destinasi' => 'required',
            'detail' => 'required|min:5|max:2000',
            'upah' => 'required|numeric'
        ];
    }
}
