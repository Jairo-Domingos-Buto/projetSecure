@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/cliente.css') }}>
@endpush

@extends('layouts.index')
@section('title', 'Clientes')

@section('content')
    <div class="container">
        <section id="clientes-section" class="content-section">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Gestão de Clientes</h3>
                @if ($errors->any())
                    <div class="alert alert-danger w-100 me-3 mb-0">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoClienteModal">
                    <i class="fas fa-plus"></i> Novo Cliente
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>NIF</th>
                                <th>Morada</th>
                                {{-- <th>Data de Nascimento</th> --}}
                                <th>Tipo</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id }}</td>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->nif }}</td>
                                    <td>{{ $cliente->endereco }}</td>
                                   {{--  <td>{{ $cliente->data_nascimento }}</td> --}}
                                    <td><span class="badge bg-info">{{ $cliente->tipo }}</span></td>
                                    <td>
                                        @if ($cliente->ativo)
                                            <span class="badge bg-success">Ativo</span>
                                        @else
                                            <span class="badge bg-secondary">Inativo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="editarCliente({{ $cliente->id }})" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:click="confirmarExclusao({{ $cliente->id }})" class="btn btn-sm btn-danger" title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Modal Novo Cliente -->
        <div class="modal fade" id="novoClienteModal" tabindex="-1" aria-labelledby="novoClienteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="novoClienteModalLabel">Cadastrar Novo Cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nome" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="nif" class="form-label">NIF</label>
                                    <input type="text"  maxlength="14   " class="form-control" id="nif" name="nif" value="{{ old('nif') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="tipo" class="form-label">Tipo de Conta</label>
                                    <select class="form-select" id="tipo" name="tipo" required>
                                        <option value="">Selecione...</option>
                                        <option value="individual" {{ old('tipo') == 'individual' ? 'selected' : '' }}>Individual</option>
                                        <option value="empresa" {{ old('tipo') == 'empresa' ? 'selected' : '' }}>Empresarial</option>
                                    </select>
                                </div>
                              {{--   <div class="col-md-4 mb-3">
                                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}" required>
                                </div> --}}
                                <div class="col-md-4 mb-3">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="tel" maxlength="9" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}">
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Morada Completa</label>
                                <textarea class="form-control" id="endereco" name="endereco" rows="2" required>{{ old('endereco') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="ativo" class="form-label">Status do Cliente</label>
                                <select class="form-select" id="ativo" name="ativo" required>
                                    <option value="1" {{ old('ativo', true) == true ? 'selected' : '' }}>Ativo</option>
                                    <option value="0" {{ old('ativo') == false ? 'selected' : '' }}>Inativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar Cliente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src={{ asset('..js/cliente.js') }}></script>

    @endpush

@endsection
