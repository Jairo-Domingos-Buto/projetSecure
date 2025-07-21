@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@extends('layouts.index')
@section('title', 'Clientes')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoClienteModal">
        Novo Cliente
    </button>
</div>

<table class="clientes-table table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>NIF</th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->nif }}</td>
            <td>{{ ucfirst($cliente->tipo) }}</td>
            <td>
                <span class="badge bg-{{ $cliente->ativo ? 'success' : 'secondary' }}">
                    {{ $cliente->ativo ? 'Ativo' : 'Inativo' }}
                </span>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-info btn-editar"
                    data-id="{{ $cliente->id }}"
                    data-nome="{{ e($cliente->nome) }}"
                    data-nif="{{ e($cliente->nif) }}"
                    data-email="{{ e($cliente->email ?? '') }}"
                    data-telefone="{{ e($cliente->telefone ?? '') }}"
                    data-endereco="{{ e($cliente->endereco ?? '') }}"
                    data-data_nascimento="{{ $cliente->data_nascimento ? $cliente->data_nascimento : '' }}"
                    data-tipo="{{ $cliente->tipo }}"
                    data-ativo="{{ $cliente->ativo ? 1 : 0 }}"
                    data-bs-toggle="modal"
                    data-bs-target="#novoClienteModal">
                    <i class="fas fa-edit"></i>Editar
                </button>
                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger btn-excluir"><i class="fas fa-trash"></i>Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Novo Cliente -->
<div class="modal fade" id="novoClienteModal" tabindex="-1" aria-labelledby="novoClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="cliente-form" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="novoClienteModalLabel">Novo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="nome">Nome Completo ou Razão Social</label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="nif">Número de Identificação Fiscal</label>
                        <input type="text" id="nif" name="nif" class="form-control" placeholder="Digite o NIF" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Digite o e-mail">
                    </div>
                    <div class="form-group mb-2">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Digite o telefone">
                    </div>
                    <div class="form-group mb-2">
                        <label for="endereco">Endereço</label>
                        <textarea id="endereco" name="endereco" class="form-control" rows="3" placeholder="Digite o endereço"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="tipo">Tipo</label>
                        <select id="tipo" name="tipo" class="form-control" required>
                            <option value="individual">Individual</option>
                            <option value="empresa">Empresa</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="ativo">Status</label>
                        <select id="ativo" name="ativo" class="form-control">
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
