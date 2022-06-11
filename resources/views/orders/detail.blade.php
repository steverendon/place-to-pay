@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <p class="h3 text-center">Resumen de la compra</p>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow">
                    <img src="https://picsum.photos/200/200?random" class="card-img-top" alt="..." height="200">

                    <div class="card-body">
                        <h4>Balon Profesional - $ 190.000</h4>
                        <h5 class="card-title">Informacion del comprador</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td colspan="2">Nombre:</td>
                                    <td>{{ $order->customer_name }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Movil: </td>
                                    <td>{{ $order->customer_mobile }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Email:</td>
                                    <td>{{ $order->customer_email }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label fw-bold">Numero de tarjeta</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleFormControlInput1"
                                    placeholder="5500 4444 9999"
                                    name="numberCard"
                                >
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="button">Pagar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection