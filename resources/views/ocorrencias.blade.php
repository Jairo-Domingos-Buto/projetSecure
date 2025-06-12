@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@extends('layouts.index')

@section('content')
<section id="ocorrencias-section" class="content-section" style="display:none;">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h3>Ocorrências Bancárias Recentes</h3>
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaOcorrenciaModal">
			Nova Ocorrência
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
		<tbody id="ocorrencias-tbody">
			<script>
			</script>
		</tbody>
	</table>

	<!-- Modal Nova Ocorrência -->
	<div class="modal fade" id="novaOcorrenciaModal" tabindex="-1" aria-labelledby="novaOcorrenciaModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="ocorrencia-form" class="ocorrencia-form">
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
							<input type="text" id="local" name="local_ocorrencia" class="form-control" placeholder="" >
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
</section>
@endsection