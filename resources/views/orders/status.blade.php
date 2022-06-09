@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pago Fallido</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <p class="h3 text-center">Estado de la compra</p>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Movil</th>
                            <th scope="col">Email</th>
                            <th>Estado</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->customer_mobile }}</td>
                                <td>{{ $order->customer_email }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    @if ($order->status == 'REJECTED')
                                    <button class="btn btn-success">Reintentar</button>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection