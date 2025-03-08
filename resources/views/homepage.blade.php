@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="main-content">
    <h1>Produtos</h1>
    <div class="content-header">
        <form class="d-flex">
            <select class="form-select select-form-item" id="exampleSelect1">
                <option disabled selected>Buscar por</option>
                <option>Produto</option>
                <option>Fornecedor</option>
                <option>Data</option>
                <option>Preço</option>
            </select>
            <input class="form-control me-sm-2 search-form-item" type="search" placeholder="Search">
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
                <th scope="col">Produto</th>
                <th scope="col">fornecedor</th>
                <th scope="col">Validade</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Custo</th>
                <th scope="col">Venda</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->supplier->name }}</td>
                    <td>{{ $product->expiration_date }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>R$ {{ $product->cost }}</td>
                    <td>R$ {{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
</div>

@endsection
