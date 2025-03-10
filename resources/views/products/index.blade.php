@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="main-content">
    <h1>Produtos</h1>
    <div class="content-header" style="display:flex">
        <input class="form-control me-sm-2 search-form-item" type="search" id="searchInput" placeholder="Buscar">
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="products-table">
        <thead>
            <tr>
                <th class="table-head" scope="col">Produto</th>
                <th class="table-head" scope="col">Fornecedor</th>
                <th class="table-head" scope="col">Validade</th>
                <th class="table-head" scope="col">Quantidade</th>
                <th class="table-head" scope="col">Custo</th>
                <th class="table-head" scope="col">Venda</th>
            </tr>
        </thead>
        <tbody id="productsTableBody">
            @foreach ($products as $product)
                <tr class="productRow">
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->supplier->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($product->expiration_date)->format('d/m/Y') }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>R$ {{ $product->cost }}</td>
                    <td>R$ {{ $product->price }}</td>
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

            const rows = document.querySelectorAll('.productRow');

            rows.forEach(function (row) {
                const productName = row.cells[0].textContent.toLowerCase();
                const supplierName = row.cells[1].textContent.toLowerCase();

                if (productName.includes(searchTerm) || supplierName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
