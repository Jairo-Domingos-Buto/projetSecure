@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@extends('layouts.index')
@section('title', 'Reembolso')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReembolso">
        Reembolso
    </button>
</div>
<table class="clientes-table table">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Fatura</th>
            <th>Valor</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reembolsos as $r)
        <tr>
            <td>{{ $r->cliente->nome }}</td>
            <td>{{ $r->fatura->numero ?? 'N/A' }}</td>
            <td>{{ number_format($r->valor, 2, ',', '.') }}</td>
            <td>{{ $r->data_reembolso }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection