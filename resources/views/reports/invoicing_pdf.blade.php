<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faturamento - {{ \Carbon\Carbon::parse($today)->format('d/m/Y') }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .title { text-align: center; font-size: 16px; font-weight: bold; margin-bottom: 10px; }
        .total { font-weight: bold; text-align: right; }
    </style>
</head>
<body>

    <div class="title">Faturamento - {{ \Carbon\Carbon::parse($today)->format('d/m/Y') }}</div>

    <table>
        <thead>
            <tr>
                <th>Hora</th>
                <th>Vendedor</th>
                <th>Método de Pagamento</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($sale->date_time)->format('H:i') }}</td>
                    <td>{{ $sale->user->name }}</td>
                    <td>{{ $sale->payment_method }}</td>
                    <td>R$ {{ number_format($sale->total_cost, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="total">Total:</td>
                <td>R$ {{ number_format($totalSales, 2, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
