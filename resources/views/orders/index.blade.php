@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow" style="width: 18rem;">
                    <div class="card-header bg-primary text-white">
                        <p class="h3 text-center">Realizar pedido</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <form action="{{ route('orders.store') }}" method="post">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleFormControlInput1"
                                    placeholder="Mario Moreno"
                                    name="customer_name"
                                >
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="exampleFormControlInput1"
                                    placeholder="name@example.com"
                                    name="customer_email"
                                >
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Movil</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleFormControlInput1"
                                    placeholder="313 777 7777"
                                    name="customer_mobile"
                                >
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Cantidad</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="exampleFormControlInput1"
                                    value="1"
                                    name="amount"
                                >
                            </div>
                            <div class="d-grid gap-2">
                                @csrf
                                <button class="btn btn-success" type="submit">Continuar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <img src="https://picsum.photos/700/400?random" class="card-img-top" alt="..." height="400">
                    <div class="card-body">
                        <h5 class="card-title">$ 190.000</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection