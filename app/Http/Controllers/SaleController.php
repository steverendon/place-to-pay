<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __invoke()
    {
        $orders = Order::where('status', 'PAYED')->get();

        return view('sales.index', compact('orders'));
    }
}
