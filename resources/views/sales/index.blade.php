@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="main-content">
    <h1>Histórico de Vendas</h1>
    <div class="content-header">
        <form class="d-flex" method="GET" action="#">
            <!-- <select class="form-select select-form-item" id="exampleSelect1">
                <option disabled selected>Buscar por</option>
                <option>Cliente</option>
                <option>Valor</option>
                <option>Pagamento</option>
                <option>Horário</option>
            </select> -->
            <input class="form-control me-sm-2 search-form-item" type="search" name="search" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0 search-button" type="submit">Search</button>
            <button type="button" class="btn btn-info">Novo</button>
        </form>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="products-table">
        <thead>
            <tr>
                <th class="table-head" scope="col">Vendedor</th>
                <th class="table-head" scope="col">Horário</th>
                <th class="table-head" scope="col">Cliente</th>
                <th class="table-head" scope="col">Produtos</th>
                <th class="table-head" scope="col">Pagamento</th>
                <th class="table-head" scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->user->name }}</td>
                    <td>{{ $sale->date_time }}</td>
                    <td>{{ $sale->client_name }}</td>
                    <td>
                        <ul class="limited-text">
                            @foreach ($sale->products as $product)
                            {{ $product->pivot->quantity }} {{ $product->name }},
                            @endforeach
                        </ul>
                    </td>
                    <td> {{ $sale->payment_method }}</td>
                    <td>R$ {{ $sale->total_cost }}</td>
                </tr>
            @endforeach
        </tbody>
</div>

@endsection
