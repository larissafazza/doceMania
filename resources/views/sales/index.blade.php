@extends('layouts.app')

@section('title', 'Histórico de Vendas')

@section('content')
<div class="main-content">
    <h1>Histórico de Vendas</h1>
    <div class="content-header" style="display:flex">
        <input class="form-control me-sm-2 search-form-item" type="search" id="searchInput" placeholder="Buscar">
        <button type="button" class="btn btn-info" style="float:right;">Novo</button>
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
        <tbody id="salesTableBody">
            @foreach ($sales as $sale)
                <tr class="saleRow">
                    <td>{{ $sale->user->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($sale->date_time)->format('d/m/Y H:i') }}</td>
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
    </table>
</div>

@endsection

<script>
    window.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            const rows = document.querySelectorAll('.saleRow'); // Corrigir para .saleRow

            rows.forEach(function (row) {
                // Acessar as células corretamente de acordo com a tabela de vendas
                const sellerName = row.cells[0].textContent.toLowerCase(); // Vendedor
                const saleTime = row.cells[1].textContent.toLowerCase(); // Horário
                const clientName = row.cells[2].textContent.toLowerCase(); // Cliente
                const products = row.cells[3].textContent.toLowerCase(); // Produtos
                const paymentMethod = row.cells[4].textContent.toLowerCase(); // Pagamento

                // Verifica se algum campo contém o termo de pesquisa
                if (
                    sellerName.includes(searchTerm) ||
                    saleTime.includes(searchTerm) ||
                    clientName.includes(searchTerm) ||
                    products.includes(searchTerm) ||
                    paymentMethod.includes(searchTerm)
                ) {
                    row.style.display = ''; // Exibe a linha
                } else {
                    row.style.display = 'none'; // Oculta a linha
                }
            });
        });
    });
</script>
