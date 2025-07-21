<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Reembolso Nº {{ $reembolso->id }}</title>
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
                Recibo / Reembolso
            </span>
        </div>
    </div>

    <table class="invoice-table">
        <tr>
            <th>Reembolso</th>
            <td>Nº {{ $reembolso->id }}</td>
        </tr>
        <tr>
            <th>Cliente</th>
            <td>{{ $reembolso->cliente ? $reembolso->cliente->nome : 'N/D' }}</td>
        </tr>
        <tr>
            <th>Fatura</th>
            <td>{{ $reembolso->fatura ? $reembolso->fatura->descricao : 'N/D' }}</td>
        </tr>
        <tr>
            <th>Valor</th>
            <td>{{ number_format($reembolso->valor, 2, ',', '.') }} KZ</td>
        </tr>
        <tr>
            <th>Data do Reembolso</th>
            <td>
            @if($reembolso->data_reembolso)
                {{ \Carbon\Carbon::parse($reembolso->data_reembolso)->format('d/m/Y') }}
            @else
                -
            @endif
            </td>
        </tr>
        <tr>
            <th>Motivo</th>
            <td>{{ $reembolso->observacao ?? '-' }}</td>
        </tr>
        <tr>
            <th>Data de Aprovação</th>
            <td>
            @if($reembolso->data_aprovacao)
                {{ \Carbon\Carbon::parse($reembolso->data_aprovacao)->format('d/m/Y') }}
            @else
                -
            @endif
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($reembolso->status) }}</td>
        </tr>
    </table>

    <div class="footer">
        Documento gerado automaticamente pelo sistema Maindseat
    </div>
</body>
</html>
