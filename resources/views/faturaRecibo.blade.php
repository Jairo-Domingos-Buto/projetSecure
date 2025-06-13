<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @php
        // Supondo que $fatura seja passado do controller para a view
    @endphp

    <h1>Fatura do Cliente #{{ $fatura->cliente_id }}</h1>

    <ul>
        <li><strong>Valor Total:</strong> {{ number_format($fatura->valor_total, 2, ',', '.') }} €</li>
        <li><strong>Data de Emissão:</strong> {{ \Carbon\Carbon::parse($fatura->data_emissao)->format('d/m/Y') }}</li>
        <li><strong>Data de Vencimento:</strong> {{ \Carbon\Carbon::parse($fatura->data_vencimento)->format('d/m/Y') }}</li>
        <li><strong>Status:</strong> {{ ucfirst($fatura->status) }}</li>
        <li><strong>Descrição:</strong> {{ $fatura->descricao }}</li>
    </ul>
</body>
</html>