@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="main-content">
    <h1>Criar produto</h1>
    <div class="content-header">
        <form class="d-flex" method="POST" id="productForm" action="{{ route('products.store') }}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantidade</label>
                <input type="number" class="form-control" name="quantity" id="quantity" required>
            </div>
            <div class="form-group">
                <label for="expirationDate">Data de validade</label>
                <input type="date" class="form-control" name="expirationDate" id="expirationDate" required>
            </div>
            <div class="form-group">
                <label for="price">Preço</label>
                <input type="number" class="form-control" name="price" id="price" required>
            </div>

            <div class="mb-3">
                <label for="supplier_id" class="form-label">Fornecedor</label>
                <select class="form-control" id="supplier_id" name="supplier_id" required>
                    <option value="">Selecione um fornecedor</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
            <button class="btn btn-secondary my-2 my-sm-0 search-button" type="submit">Criar 2</button>
        </form>
    </div>
</div>

<!-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif -->

<!-- <div id="successMessage" class="alert alert-success" style="display: none;"></div> -->


<script>
    document.getElementById("productForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita o reload da página

        let formData = new FormData(this);

        fetch(this.action, {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // alert("Produto adicionar com sucesso!");
                
                let toast = new bootstrap.Toast(document.getElementById("successToast"));
                toast.show();
                document.getElementById("productForm").reset(); // Reseta os campos
            } else {
                alert("Algo deu erro ao adicionar o produto!");
            }
        })
        .catch(error => console.log(error));
    });
</script>

@endsection
