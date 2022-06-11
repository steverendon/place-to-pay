<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Repositories\OrderEloquentRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $repository;

    public function __construct(OrderEloquentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('orders.index');
    }

    public function store(Request $request)
    {
        $order = $this->repository->save($request->all());

        return redirect( route('order.show', ['id' => $order->id]) );
    }

    public function status()
    {
        return view('orders.status');
    }

    public function show(int $id)
    {
        $order = $this->repository->find($id);

        return view('orders.detail', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $this->repository->update($id, $request->all());
    }
}
