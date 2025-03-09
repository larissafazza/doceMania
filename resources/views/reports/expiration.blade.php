@extends('layouts.app')

@section('title', 'Relatório')

@section('content')
<div class="main-content">
    <table class="products-table">
        <thead>
            <tr>
                <th class="table-title" colspan="4">
                    <h4 class="table-head">PRODUTOS COM VALIDADE CURTA</h4>
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th class="table-head" scope="col">Produto</th>
                <th class="table-head" scope="col">fornecedor</th>
                <th class="table-head" scope="col">Custo</th>
                <th class="table-head" scope="col">Preço de venda</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($missingProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->supplier->name }}</td>
                    <td>R$ {{ $product->cost }}</td>
                    <td>R$ {{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
