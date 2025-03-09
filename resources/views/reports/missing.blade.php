@extends('layouts.app')

@section('title', 'Relatório')

@section('content')
<div class="main-content">
    <div class="d-flex justify-content-end mb-3">
        <!-- <button type="button" class="btn btn-info">Exportar</button> -->
        <a href="{{ route('report.missing.export') }}" class="btn btn-info">Exportar PDF</a>
    </div>
    <table class="products-table">
        <thead>
            <tr>
                <th class="table-title" colspan="4">
                    <h4 class="table-head">LISTA DE FALTAS</h4>
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
