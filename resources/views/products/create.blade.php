@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="">
    <h1>Criar produto</h1>
    <div class="container">
        <form method="POST" id="productForm" action="{{ route('products.store') }}">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" required>
                </div>
                <div class="col-md-2">
                    <label for="quantity">Quantidade</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" required>
                </div>
                <div class="col-md-4">
                    <label for="expirationDate">Data de validade</label>
                    <input type="date" class="form-control" name="expirationDate" id="expirationDate" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="price">Preço</label>
                    <input type="float" class="form-control" name="price" id="price" required>
                </div>

                <div class="col-md-6">
                    <label for="supplier_id">Fornecedor</label>
                    <select class="form-control" id="supplier_id" name="supplier_id" required>
                        <option value="">Selecione um fornecedor</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Usando um contêiner d-flex para alinhar o botão à direita -->
            <div class="form-group d-flex justify-content-end">
                <button class="btn btn-secondary mt-2" type="submit">Criar</button>
            </div>
        </form>
    </div>
</div>

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
