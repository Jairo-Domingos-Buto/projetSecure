document.addEventListener('DOMContentLoaded', function () {
	// Função para carregar ocorrências via AJAX
	function carregarOcorrencias() {
		fetch("{{ route('ocorrencias.index') }}")
			.then(response => response.json())
			.then(data => {
				let tbody = document.querySelector('.ocorrencias-table tbody');
				tbody.innerHTML = '';
				data.forEach(ocorrencia => {
					tbody.innerHTML += `
						<tr>
							<td>${ocorrencia.id}</td>
							<td>${ocorrencia.cliente_nome ?? ocorrencia.numero_conta}</td>
							<td>${ocorrencia.tipo_label}</td>
							<td>${ocorrencia.data_ocorrencia}</td>
							<td>
								<span class="status status-${ocorrencia.status}">
									${ocorrencia.status_label}
								</span>
							</td>
							<td>
								<button class="btn btn-sm btn-info btn-editar" data-id="${ocorrencia.id}"><i class="fas fa-edit"></i></button>
								<button class="btn btn-sm btn-danger btn-excluir" data-id="${ocorrencia.id}"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					`;
				});
			});
	}

	carregarOcorrencias();

	// Submissão do formulário de nova ocorrência (ou edição)
	document.getElementById('ocorrencia-form').addEventListener('submit', function (e) {
		e.preventDefault();
		let form = e.target;
		let formData = new FormData(form);
		let id = form.getAttribute('data-id');
		let url = id ? `/ocorrencias/${id}` : "{{ route('ocorrencias.store') }}";
		let method = id ? 'PUT' : 'POST';

		fetch(url, {
			method: method,
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			body: formData
		})
		.then(response => response.json())
		.then(data => {
			if(data.success){
				carregarOcorrencias();
				var modal = bootstrap.Modal.getInstance(document.getElementById('novaOcorrenciaModal'));
				modal.hide();
				form.reset();
				form.removeAttribute('data-id');
				form.querySelector('.modal-title').textContent = 'Nova Ocorrência Bancária';
			} else {
				alert('Erro ao salvar ocorrência!');
			}
		});
	});

	// Editar ocorrência
	document.querySelector('.ocorrencias-table').addEventListener('click', function(e){
		if(e.target.closest('.btn-editar')){
			let id = e.target.closest('.btn-editar').getAttribute('data-id');
			fetch(`/ocorrencias/${id}`)
				.then(response => response.json())
				.then(ocorrencia => {
					let form = document.getElementById('ocorrencia-form');
					form.setAttribute('data-id', id);
					form.numero_conta.value = ocorrencia.numero_conta;
					form.tipo.value = ocorrencia.tipo_ocorrencia;
					form.data_ocorrencia.value = ocorrencia.data_ocorrencia.replace(' ', 'T');
					form.local.value = ocorrencia.local_ocorrencia ?? '';
					form.descricao.value = ocorrencia.descricao ?? '';
					form.status.value = ocorrencia.status;
					form.querySelector('.modal-title').textContent = 'Editar Ocorrência Bancária';
					var modal = new bootstrap.Modal(document.getElementById('novaOcorrenciaModal'));
					modal.show();
				});
		}
	});

	// Excluir ocorrência
	document.querySelector('.ocorrencias-table').addEventListener('click', function(e){
		if(e.target.closest('.btn-excluir')){
			if(confirm('Tem certeza que deseja excluir esta ocorrência?')){
				let id = e.target.closest('.btn-excluir').getAttribute('data-id');
				fetch(`/ocorrencias/${id}`, {
					method: 'DELETE',
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					}
				})
				.then(response => response.json())
				.then(data => {
					if(data.success){
						carregarOcorrencias();
					} else {
						alert('Erro ao excluir ocorrência!');
					}
				});
			}
		}
	});

	// Ao fechar o modal, limpa o formulário
	document.getElementById('novaOcorrenciaModal').addEventListener('hidden.bs.modal', function () {
		let form = document.getElementById('ocorrencia-form');
		form.reset();
		form.removeAttribute('data-id');
		form.querySelector('.modal-title').textContent = 'Nova Ocorrência Bancária';
	});
});