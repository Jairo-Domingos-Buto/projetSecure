@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@extends('layouts.index')
@section('title', 'Adiantamento de recibos')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reciboModal">
		Novo Recibo
	</button>
</div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Valor</th>
                    <th>Data de Pagamento</th>
                    <th>Descrição</th>
                    <th>Cliente</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recibos as $recibo)
                    <tr>
                        <td>{{ number_format($recibo->valor, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($recibo->data_emissao)->format('d/m/Y') }}</td>
                        <td>{{ $recibo->descricao }}</td>
                        <td>
                            @if($recibo->cliente)
                                {{ $recibo->cliente->nome }}
                            @else
                                <span class="text-muted">Não vinculado</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nenhum recibo cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="reciboModal" tabindex="-1" aria-labelledby="reciboModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('recibos.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="reciboModalLabel">Recibo de Adiantamento</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="valor" class="form-label">Valor do Adiantamento</label>
                                    <input type="number" name="valor" step="0.01" class="form-control" required placeholder="Informe o valor">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="data_pagamento" class="form-label">Data de Pagamento</label>
                                    <input type="date" name="data_pagamento" class="form-control" required>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="descricao" class="form-label">Descrição</label>
                                    <textarea name="descricao" class="form-control" rows="3" placeholder="Descreva o motivo do adiantamento"></textarea>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="cliente_id" class="form-label">Vincular ao Cliente</label>
                                    <select name="cliente_id" class="form-control">
                                        <option value="">Escolha um Cliente</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar Recibo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection