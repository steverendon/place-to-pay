<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        return view('orders.order');
    }

    public function pay(Order $order)
    {

        return view('orders.pay', compact('order'));
    }

    public function status()
    {
        return view('orders.status');
    }

    public function all()
    {
        $orders = Order::all();

        return view('orders.all', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.status', compact('order'));
    }

    public function store(Request $request)
    {
        Order::create($request->all());

        return redirect(route('pagos'));
    }

    public function update(Order $order, Request $request)
    {
        $order->update($request->all());
    }
}
