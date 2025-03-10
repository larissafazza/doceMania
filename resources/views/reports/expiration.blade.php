@extends('layouts.app')

@section('title', 'Relatório')

@section('content')
<div class="main-content">
    <table class="products-table">
        <thead>
            <tr>
                <th class="table-title" colspan="5">
                    <h4 class="table-head">PRODUTOS COM VALIDADE CURTA</h4>
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th class="table-head" scope="col">Validade</th>
                <th class="table-head" scope="col">Produto</th>
                <th class="table-head" scope="col">Custo</th>
                <th class="table-head" scope="col">Preço de venda</th>
                <th class="table-head" scope="col">Sugestão</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expiringProducts as $product)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($product->expiration_date)->format('d/m/Y') }}</td>
                    <td>{{ $product->name }}</td>
                    <td>R$ {{ $product->cost }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($product->price*0.75, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
