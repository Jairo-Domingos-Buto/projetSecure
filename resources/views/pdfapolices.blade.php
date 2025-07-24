<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Apolice Nº {{ $apolice->numero }}</title>
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
                Apolice de Seguro
            </span>
        </div>
    </div>

    <table class="invoice-table">
        <tr>
            <th>Cliente</th>
            <td>{{ $apolice->cliente->nome }}</td>
        </tr>
        <tr>
            <th>Numero da Apólice</th>
            <td>{{ $apolice->numero }}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>
            {{ $apolice->tipo }}
            </td>
        </tr>
        <tr>
            <th>Valor</th>
            <td>{{ number_format($apolice->valor, 2, ',', '.') }} </td>
        </tr>
        <tr>
            <th>Data Inicio</th>
            <td>{{ $apolice->data_inicio }}</td>
        </tr>
        <tr>
            <th>Data Fim</th>
            <td>{{ $apolice->data_fim }}</td>
        </tr>
    </table>

    <div class="footer">
        Documento gerado automaticamente pelo sistema Maindseat
    </div>
</body>
</html>

