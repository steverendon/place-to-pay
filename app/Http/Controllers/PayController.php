<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Repositories\OrderEloquentRepository;

class PayController extends Controller
{
    private $repository;

    public function __construct(OrderEloquentRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function index()
    {

    }

    public function pay(Order $order)
    {
        return view('orders.pay', compact('order'));
    }

    public function getAll()
    {
        $orders = $this->repository->all();

        return view('orders.all', compact('orders'));
    }
}
