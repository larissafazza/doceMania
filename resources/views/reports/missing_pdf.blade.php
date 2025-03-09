<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Faltas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .table-title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2>Lista de Produtos em Falta</h2>

    <table>
        <thead>
            <tr>
                <th class="table-title" colspan="4">LISTA DE FALTAS</th>
            </tr>
            <tr>
                <th>Produto</th>
                <th>Fornecedor</th>
                <th>Custo</th>
                <th>Preço de Venda</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($missingProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->supplier->name }}</td>
                    <td>R$ {{ number_format($product->cost, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
