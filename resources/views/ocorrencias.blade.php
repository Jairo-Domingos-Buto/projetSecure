@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@extends('layouts.index')
@section('title', 'Ocorrencias')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaOcorrenciaModal">
        Registrar Ocorrências
    </button>
</div>
<table class="ocorrencias-table table">
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Data</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ocorrencias as $ocorrencia)
        <tr>
            <td>{{ $ocorrencia->id }}</td>
            <td>{{ $ocorrencia->numero_conta }}</td>
            <td>{{ ucfirst(str_replace('_', ' ', $ocorrencia->tipo_ocorrencia)) }}</td>
            <td>{{ \Carbon\Carbon::parse($ocorrencia->data_ocorrencia)->format('d/m/Y H:i') }}</td>
            <td>
                <span class="badge bg-{{ $ocorrencia->status == 'aberta' ? 'primary' : ($ocorrencia->status == 'em_analise' ? 'warning' : ($ocorrencia->status == 'resolvida' ? 'success' : 'secondary')) }}">
                    {{ ucfirst(str_replace('_', ' ', $ocorrencia->status)) }}
                </span>
            </td>
            <td>
                <!-- Botão Editar -->
                <button type="button" class="btn btn-warning btn-editar-ocorrencia"
                    data-id="{{ $ocorrencia->id }}"
                    data-numero_conta="{{ $ocorrencia->numero_conta }}"
                    data-tipo_ocorrencia="{{ $ocorrencia->tipo_ocorrencia }}"
                    data-data_ocorrencia="{{ $ocorrencia->data_ocorrencia }}"
                    data-local_ocorrencia="{{ $ocorrencia->local_ocorrencia }}"
                    data-descricao="{{ $ocorrencia->descricao }}"
                    data-status="{{ $ocorrencia->status }}"
                    data-bs-toggle="modal"
                    data-bs-target="#editarOcorrenciaModal">
                    Editar
                </button>

                <!-- Modal Editar Ocorrência -->
                <div class="modal fade" id="editarOcorrenciaModal" tabindex="-1" aria-labelledby="editarOcorrenciaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="editar-ocorrencia-form" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarOcorrenciaModalLabel">Editar Ocorrência Bancária</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="editar_id" name="id">
                                    <div class="form-group mb-2">
                                        <label for="editar_numero_conta">Número da Conta do Cliente</label>
                                        <input type="text" id="editar_numero_conta" name="numero_conta" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="editar_tipo_ocorrencia">Tipo de Ocorrência Bancária</label>
                                        <select id="editar_tipo_ocorrencia" name="tipo_ocorrencia" class="form-control" required>
                                            <option value="transacao_suspeita">Transação Suspeita</option>
                                            <option value="problema_cartao">Problema com Cartão</option>
                                            <option value="saque_nao_reconhecido">Saque Não Reconhecido</option>
                                            <option value="fraude">Fraude</option>
                                            <option value="roubo">Roubo</option>
                                            <option value="outro">Outro</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="editar_data_ocorrencia">Data da Ocorrência</label>
                                        <input type="datetime-local" id="editar_data_ocorrencia" name="data_ocorrencia" class="form-control" required min="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="editar_local_ocorrencia">Local (ou Agência/Canal)</label>
                                        <input type="text" id="editar_local_ocorrencia" name="local_ocorrencia" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="editar_descricao">Descrição da Ocorrência</label>
                                        <textarea id="editar_descricao" name="descricao" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="editar_status">Status</label>
                                        <select id="editar_status" name="status" class="form-control">
                                            <option value="aberta">Aberta</option>
                                            <option value="em_analise">Em Análise</option>
                                            <option value="resolvida">Resolvida</option>
                                            <option value="fechada">Fechada</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="editar_anexos">Anexar Documentos/Comprovantes (opcional)</label>
                                        <input type="file" id="editar_anexos" name="anexos[]" class="form-control" multiple>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const editarButtons = document.querySelectorAll('.btn-editar-ocorrencia');

                        editarButtons.forEach(button => {
                            button.addEventListener('click', function() {
                                // Pega os dados do botão
                                const id = this.dataset.id;
                                const numeroConta = this.dataset.numero_conta;
                                const tipoOcorrencia = this.dataset.tipo_ocorrencia;
                                const dataOcorrencia = this.dataset.data_ocorrencia;
                                const localOcorrencia = this.dataset.local_ocorrencia;
                                const descricao = this.dataset.descricao;
                                const status = this.dataset.status;

                                // Preenche os campos do modal
                                document.getElementById('editar_id').value = id;
                                document.getElementById('editar_numero_conta').value = numeroConta;
                                document.getElementById('editar_tipo_ocorrencia').value = tipoOcorrencia;

                                // Converte data para o formato aceito pelo input datetime-local, se necessário
                                if (dataOcorrencia) {
                                    const data = new Date(dataOcorrencia);
                                    const iso = data.toISOString().slice(0, 16); // yyyy-MM-ddTHH:mm
                                    document.getElementById('editar_data_ocorrencia').value = iso;
                                }

                                document.getElementById('editar_local_ocorrencia').value = localOcorrencia;
                                document.getElementById('editar_descricao').value = descricao;
                                document.getElementById('editar_status').value = status;

                                // Define a ação do formulário dinamicamente (se necessário)
                                const form = document.getElementById('editar-ocorrencia-form');
                                form.action = `/ocorrencias/${id}`; // ajuste o endpoint conforme seu backend
                            });
                        });
                    });
                </script>

                <form action="{{ route('ocorrencias.destroy', $ocorrencia->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Nova Ocorrência -->
<div class="modal fade" id="novaOcorrenciaModal" tabindex="-1" aria-labelledby="novaOcorrenciaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="ocorrencia-form" class="ocorrencia-form" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="novaOcorrenciaModalLabel">Nova Ocorrência Bancária</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="numero_conta">Número da Conta do Cliente</label>
                        <input type="text" id="numero_conta" name="numero_conta" class="form-control" placeholder="Digite o número da conta" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tipo">Tipo de Ocorrência Bancária</label>
                        <select id="tipo" name="tipo_ocorrencia" class="form-control" required>
                            <option value="">Selecione o tipo</option>
                            <option value="transacao_suspeita">Transação Suspeita</option>
                            <option value="problema_cartao">Problema com Cartão</option>
                            <option value="saque_nao_reconhecido">Saque Não Reconhecido</option>
                            <option value="fraude">Fraude</option>
                            <option value="roubo">Roubo</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="data_ocorrencia">Data da Ocorrência</label>
                        <input type="datetime-local" id="data_ocorrencia" name="data_ocorrencia" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="local">Local (ou Agência/Canal)</label>
                        <input type="text" id="local" name="local_ocorrencia" class="form-control" placeholder="">
                    </div>
                    <div class="form-group mb-2">
                        <label for="descricao">Descrição da Ocorrência</label>
                        <textarea id="descricao" name="descricao" class="form-control" rows="3" placeholder="Descreva detalhadamente o ocorrido"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="aberta" selected>Aberta</option>
                            <option value="em_analise">Em Análise</option>
                            <option value="resolvida">Resolvida</option>
                            <option value="fechada">Fechada</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="anexos">Anexar Documentos/Comprovantes (opcional)</label>
                        <input type="file" id="anexos" name="anexos[]" class="form-control" multiple>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar Ocorrência</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        $('#ocorrencia-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this)[0];
            var formData = new FormData(form);

            $.ajax({
                url: "{{ route('ocorrencias.store') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    // Fecha a modal
                    $('#novaOcorrenciaModal').modal('hide');
                    // Limpa o formulário
                    $('#ocorrencia-form')[0].reset();

                    // Atualiza a tabela via AJAX
                    $.ajax({
                        url: "{{ route('ocorrencias.index') }}",
                        type: "GET",
                        dataType: "html",
                        success: function(html) {
                            // Extrai apenas o tbody da tabela de ocorrências da resposta HTML
                            var newTbody = $(html).find('.ocorrencias-table tbody').html();
                            $('.ocorrencias-table tbody').html(newTbody);
                        }
                    });
                },
                error: function(xhr) {
                    alert('Erro ao cadastrar ocorrência!');
                }
            });
        });
    });
</script>
@endpush
</div>
</div>
</section>

@endsection