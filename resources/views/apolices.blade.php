@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@extends('layouts.index')
@section('title', 'Apolices')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovaApolice">
        Apolices
    </button>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Número</th>
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($apolices as $apolice)
        <tr>
            <td>{{ $apolice->numero }}</td>
            <td>{{ $apolice->cliente->nome ?? 'N/A' }}</td>
            <td>{{ $apolice->tipo }}</td>
            <td>{{ number_format($apolice->valor, 2, ',', '.') }}</td>
            <td>{{ $apolice->data_inicio }}</td>
            <td>{{ $apolice->data_fim }}</td>
            <td>
                <!-- Botão Editar (abre modal) -->
                <button type="button" class="btn btn-secondary btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modalEditarApolice{{ $apolice->id }}" title="Editar">
                    <i class="bi bi-pencil-square"></i>
                </button>

                <!-- Botão Imprimir -->
                <a href="{{ route('apolices.imprimir', $apolice->id) }}" target="_blank" class="btn btn-secondary btn-sm" title="Imprimir">
                    <i class="bi bi-printer"></i>
                </a>

                <a href="{{ route('apolices.renovar.manual', $apolice->id) }}" class="btn btn-secondary btn-sm" title="Renovar"
                    onclick="return confirm('Deseja renovar esta apólice?')">
                    <i class="bi bi-arrow-repeat"></i>
                </a>

                <!-- Botão Excluir -->
                <form action="{{ route('apolices.destroy', $apolice) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn btn-secondary btn-sm" onclick="return confirm('Deseja excluir?')" title="Eliminar">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<!-- Modal de Criação -->
<div class="modal fade" id="modalNovaApolice" tabindex="-1" aria-labelledby="modalNovaApoliceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('apolices.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNovaApoliceLabel">Nova Apólice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cliente_id" class="form-label">Cliente</label>
                        <select name="cliente_id" class="form-select" required>
                            <option value="">Selecione um cliente</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" name="numero" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="data_inicio" class="form-label">Data Início</label>
                        <input type="date" name="data_inicio" class="form-control" required min="{{ date('Y-m-d') }}">
                    </div>


                    <div class="mb-3">
                        <label for="data_fim" class="form-label">Data Fim</label>
                        <input type="date" name="data_fim" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" step="0.01" name="valor" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select id="tipos" name="tipo" class="form-control">
                            <option value="seguro">Selecione o seguro</option>
                            <option value="vida">Vida</option>
                            <option value="carro">Carro</option>
                            <option value="saude">Saúde</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Editar -->
<div class="modal fade" id="modalEditarApolice{{ $apolice->id }}" tabindex="-1" aria-labelledby="modalEditarApoliceLabel{{ $apolice->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('apolices.update', $apolice->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarApoliceLabel{{ $apolice->id }}">Editar Apólice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Cliente</label>
                        <select name="cliente_id" class="form-select" required>
                            <option value="">Selecione um cliente</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $apolice->cliente_id == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nome }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Número</label>
                        <input type="text" name="numero" class="form-control" value="{{ $apolice->numero }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Data Início</label>
                        <input type="date" name="data_inicio" class="form-control" value="{{ $apolice->data_inicio }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Data Fim</label>
                        <input type="date" name="data_fim" class="form-control" value="{{ $apolice->data_fim }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Valor</label>
                        <input type="number" step="0.01" name="valor" class="form-control" value="{{ $apolice->valor }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Tipo</label>
                        <input type="text" name="tipo" class="form-control" value="{{ $apolice->tipo }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>

@endsection