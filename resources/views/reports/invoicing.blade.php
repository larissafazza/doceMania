@extends('layouts.app')

@section('title', 'Relatório')

@section('content')
<div class="main-content">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('report.invoicing.export') }}" class="btn btn-info">Exportar</a>
    </div>
    <table class="products-table">
        <thead>
            <tr>
                <th class="table-title" colspan="4">
                    <h4 class="table-head">Faturamento - {{ \Carbon\Carbon::parse($today)->format('d/m/Y') }}</h4>
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th class="table-head" scope="col">Hora</th>
                <th class="table-head" scope="col">Vendedor</th>
                <th class="table-head" scope="col">Método de Pagamento</th>
                <th class="table-head" scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($sale->date_time)->format('H:i') }}</td>
                    <td>{{ $sale->user->name }}</td>
                    <td>{{ $sale->payment_method }}</td>
                    <td>R$ {{   number_format($sale->total_cost, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-right">Total:</th>
                <th>R$ {{ number_format($totalSales, 2, ',', '.') }}</th>
            </tr>
        </tfoot>

    </table>
</div>
@endsection
