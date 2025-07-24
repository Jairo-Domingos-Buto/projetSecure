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
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Solicitante</th>
            <th>Fatura</th>
            <th>Valor</th>
            <th>Data de Solicitação</th>
            <th>Data de Aprovação</th>
            <th>Status</th>
            <th>Motivo</th>
            <th>Ações</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($reembolsos as $reembolso)
        <tr>
            <td>{{ $reembolso->cliente->nome }}</td>
            <td>
                {{ $reembolso->fatura->numero }}
                @if(!empty($reembolso->fatura->descricao))
                    - {{ $reembolso->fatura->descricao }}
                @endif
            </td>
            <td>{{ number_format($reembolso->valor, 2, ',', '.') }}</td>
            <td>{{ $reembolso->data_reembolso }}</td>
            <td>{{ $reembolso->data_aprovacao }}</td>
            <td>{{ $reembolso->status }}</td>
            <td>{{ $reembolso->observacao }}</td>
            <td>
                <!-- Botão Imprimir: abre nova aba com rota de impressão -->
                <a href="{{ route('reembolsos.imprimir', $reembolso->id) }}" target="_blank" class="btn btn-sm btn-info" title="Imprimir">
                    <i class="fas fa-eye"></i> Imprimir
                </a>
                <!-- Botão Eliminar: envia formulário DELETE via JS -->
                <form action="{{ route('reembolsos.destroy', $reembolso->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja eliminar este reembolso?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Modal para cadastrar reembolso -->
<div class="modal fade" id="modalReembolso" tabindex="-1" aria-labelledby="modalReembolsoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('reembolsos.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReembolsoLabel">Cadastrar Reembolso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cliente_id" class="form-label">Cliente</label>
                        <select class="form-select" id="cliente_id" name="cliente_id" required>
                            <option value="">Selecione o cliente</option>
                            @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fatura_id" class="form-label">Fatura</label>
                        <select class="form-select" id="fatura_id" name="fatura_id" required>
                            <option value="">Selecione a fatura</option>
                            @foreach ($faturas as $fatura)
                            <option value="{{ $fatura->id }}">
                                {{ $fatura->numero }} - {{ $fatura->descricao ?? '' }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
                    </div>
                    <div class="mb-3">
                        <label for="data_reembolso" class="form-label">Data de Solicitação</label>
                        <input type="date" class="form-control" id="data_reembolso" name="data_reembolso" required min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label for="data_aprovacao" class="form-label">Data de Aprovação</label>
                        <input type="date" class="form-control" id="data_aprovacao" name="data_aprovacao" required min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Selecione o status</option>
                            <option value="Pendente">Pendente</option>
                            <option value="Aprovado">Aprovado</option>
                            <option value="Negado">Negado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="observacao" class="form-label">Motivo</label>
                        <input type="text" class="form-control" id="observacao" name="observacao" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection