@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@extends('layouts.index')
@section('title', 'Faturas')
@section('content')
	<div class="d-flex justify-content-between align-items-center mb-3">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaFaturaModal">
			Nova Fatura
		</button>
	</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Cliente</th>
				<th>Valor</th>
				<th>Data de Emissão</th>
				<th>Vencimento</th>
				<th>Status</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@foreach($faturas as $fatura)
				<tr>
					<td>{{ $fatura->id }}</td>
					<td>{{ $fatura->cliente->nome }}</td>
					<td>{{ number_format($fatura->valor_total, 2, ',', '.') }}</td>
					<td>{{ $fatura->data_emissao }}</td>
					<td>{{ $fatura->data_vencimento }}</td>
					<td>
						@if($fatura->status === 'paga')
							<span class="badge bg-success">Paga</span>
						@elseif($fatura->status === 'pendente')
							<span class="badge bg-warning text-dark">Pendente</span>
						@else
							<span class="badge bg-secondary">{{ ucfirst($fatura->status) }}</span>
						@endif
					</td>
					<td>
						<a href="" target="_blank" class="btn btn-sm btn-info" title="Visualizar"><i class="fas fa-eye"></i></a>
						<form action="{{ route('faturas.destroy', $fatura->id) }}" method="POST" style="display:inline-block;">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('Tem certeza que deseja eliminar esta fatura?')">
								<i class="fas fa-trash"></i>
							</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<!-- Modal Nova Fatura -->
	<div class="modal fade" id="novaFaturaModal" tabindex="-1" aria-labelledby="novaFaturaModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="fatura-form" action="{{ route('faturas.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title" id="novaFaturaModalLabel">Nova Fatura</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
					</div>
					<div class="modal-body">
						<div class="form-group mb-2">
							<label for="cliente_fatura">Cliente</label>
							<select id="cliente_fatura" name="cliente_id" class="form-control" required>
								<option value="">Selecione o cliente</option>
								@foreach($clientes as $cliente)
									<option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group mb-2">
							<label for="valor_fatura">Valor</label>
							<input type="number" step="0.01" id="valor_total" name="valor_total" class="form-control" placeholder="Ex: 1200.00" required>
						</div>
						<div class="form-group mb-2">
							<label for="data_emissao">Data de Emissão</label>
							<input type="date" id="data_emissao" name="data_emissao" class="form-control" required>
						</div>
						<div class="form-group mb-2">
							<label for="data_vencimento">Data de Vencimento</label>
							<input type="date" id="data_vencimento" name="data_vencimento" class="form-control" required>
						</div>
						<div class="form-group mb-2">
							<label for="descricao_fatura">Descrição</label>
							<textarea id="descricao_fatura" name="descricao" class="form-control" rows="2" placeholder="Descrição da fatura"></textarea>
						</div>
						<div class="form-group mb-2">
							<label for="status_fatura">Status</label>
							<select id="status_fatura" name="status" class="form-control" required>
								<option value="">Selecione o status</option>
								<option value="pendente">Pendente</option>
								<option value="paga">Paga</option>
								<option value="cancelada">Cancelada</option>
							</select>
						</div>
						<div class="form-group mb-2">
							<label for="anexo_fatura">Anexar Documento (opcional)</label>
							<input type="file" id="anexo_fatura" name="anexo" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Cadastrar Fatura</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
	// CREATE
	$('#fatura-form').on('submit', function(e) {
		e.preventDefault();
		let formData = new FormData(this);
		$.ajax({
			url: "{{ route('faturas.store') }}",
			type: "POST",
			data: formData,
			processData: false,
			contentType: false,
			headers: {
				'X-CSRF-TOKEN': "{{ csrf_token() }}"
			},
			success: function(response) {
				$('#novaFaturaModal').modal('hide');
				loadFaturas();
				$('#fatura-form')[0].reset();
			},
			error: function(xhr) {
				let msg = 'Erro ao cadastrar fatura.';
				if(xhr.responseJSON && xhr.responseJSON.message) {
					msg += '\n' + xhr.responseJSON.message;
				}
				alert(msg);
			}
		});
	});

	// READ
	function loadFaturas() {
		$.ajax({
			url: "{{ route('faturas.index') }}",
			type: "GET",
			dataType: "json",
			success: function(data) {
				let tbody = '';
				$.each(data.faturas, function(i, fatura) {
					tbody += `
						<tr>
							<td>${fatura.id}</td>
							<td>${fatura.cliente.nome}</td>
							<td>${parseFloat(fatura.valor_total).toLocaleString('pt-BR', {minimumFractionDigits: 2})}</td>
							<td>${fatura.data_emissao}</td>
							<td>${fatura.data_vencimento}</td>
							<td>
								${fatura.status === 'paga' ? '<span class="badge bg-success">Paga</span>' :
									fatura.status === 'pendente' ? '<span class="badge bg-warning text-dark">Pendente</span>' :
									'<span class="badge bg-secondary">'+fatura.status.charAt(0).toUpperCase()+fatura.status.slice(1)+'</span>'}
							</td>
							<td>
								<a href="#" class="btn btn-sm btn-info visualizar-fatura" data-id="${fatura.id}" title="Visualizar"><i class="fas fa-eye"></i></a>
								<button class="btn btn-sm btn-danger deletar-fatura" data-id="${fatura.id}" title="Eliminar"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					`;
				});
				$('table tbody').html(tbody);
			},
			error: function(xhr) {
				alert('Erro ao carregar faturas. Certifique-se que a rota faturas.index retorna JSON.');
			}
		});
	}
	loadFaturas();

	// DELETE
	$(document).on('click', '.deletar-fatura', function() {
		if(!confirm('Tem certeza que deseja eliminar esta fatura?')) return;
		let id = $(this).data('id');
		$.ajax({
			url: "{{ url('faturas') }}/" + id,
			type: "POST",
			data: {_method: 'DELETE', _token: "{{ csrf_token() }}"},
			success: function(response) {
				loadFaturas();
			},
			error: function(xhr) {
				alert('Erro ao eliminar fatura.');
			}
		});
	});
});
</script>
@endpush
</section>
@endsection