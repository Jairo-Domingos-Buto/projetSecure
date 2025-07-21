<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Fatura Nº {{ $fatura->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .invoice-table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        .invoice-table th, .invoice-table td { border: 1px solid black; padding: 8px; }
        .invoice-table th { background-color: #f2f2f2; text-align: left; }
        .total-row td { font-weight: bold; font-size: 16px; }
        .footer { margin-top: 50px; text-align: center; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 30px;">
        <div style="display: flex; align-items: center;">
            <div style="font-size: 22px; font-weight: bold; color: #2c3e50;">
                Mindseat
            </div>
        </div>
        <div>
            <span style="font-size: 20px; font-weight: bold; letter-spacing: 2px; color: #e67e22; text-shadow: 1px 1px 2px #ccc;">
                Factura / Recibo
            </span>
        </div>
    </div>

    <table class="invoice-table">
        <tr>
            <th>Fatura</th>
            <td>Nº {{ $fatura->id }}</td>
        </tr>
        <tr>
            <th>Cliente</th>
            <td>{{ $fatura->cliente->nome ?? 'N/D' }}</td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td>{{ $fatura->descricao ?? '-' }}</td>
        </tr>
        <tr>
            <th>Data de Emissão</th>
            <td>{{ \Carbon\Carbon::parse($fatura->data_emissao)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <th>Data de Vencimento</th>
            <td>{{ \Carbon\Carbon::parse($fatura->data_vencimento)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($fatura->status) }}</td>
        </tr>
        <tr class="total-row">
            <td colspan="2" style="text-align:right;">
                Valor Total: {{ number_format($fatura->valor_total, 2, ',', '.') }} KZ
            </td>
        </tr>
    </table>

    <div class="footer">
        Documento gerado automaticamente pelo sistema Maindseat
    </div>
</body>
</html>
