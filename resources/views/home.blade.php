@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@extends('layouts.index')

@section('content')
<section id="dashboard-section" class="content-section">
	<!-- Stats Cards -->
	<div class="stats-grid">
		<div class="stat-card primary">
			<div class="stat-icon">
				<i class="fas fa-users"></i>
			</div>
			<div class="stat-info">
				<div class="stat-title">Usuários Ativos</div>
				<div class="stat-value">1,245</div>
				<div class="stat-change positive">
					<i class="fas fa-arrow-up"></i> 12.5%
				</div>
			</div>
		</div>
		<div class="stat-card success">
			<div class="stat-icon">
				<i class="fas fa-user-plus"></i>
			</div>
			<div class="stat-info">
				<div class="stat-title">Novos Cadastros</div>
				<div class="stat-value">87</div>
				<div class="stat-change positive">
					<i class="fas fa-arrow-up"></i> 5.2%
				</div>
			</div>
		</div>
		<div class="stat-card warning">
			<div class="stat-icon">
				<i class="fas fa-file-alt"></i>
			</div>
			<div class="stat-info">
				<div class="stat-title">Relatórios Pendentes</div>
				<div class="stat-value">5</div>
				<div class="stat-change negative">
					<i class="fas fa-arrow-down"></i> 2.3%
				</div>
			</div>
		</div>
		<div class="stat-card danger">
			<div class="stat-icon">
				<i class="fas fa-exclamation-triangle"></i>
			</div>
			<div class="stat-info">
				<div class="stat-title">Problemas</div>
				<div class="stat-value">3</div>
				<div class="stat-change positive">
					<i class="fas fa-arrow-up"></i> 1.1%
				</div>
			</div>
		</div>
	</div>
	<!-- Charts Row -->
	<div class="charts-row">
		<div class="chart-card">
			<div class="card-header">
				<h3>Atividade Mensal</h3>
				<div class="card-actions">
					<button class="action-btn">
						<i class="fas fa-ellipsis-h"></i>
					</button>
				</div>
			</div>
			<div class="chart-container">
				<div class="chart-placeholder">
					<img src="https://via.placeholder.com/600x300?text=Gráfico+de+Atividades" alt="Chart">
				</div>
			</div>
		</div>
		<div class="chart-card small">
			<div class="card-header">
				<h3>Distribuição de Usuários</h3>
				<div class="card-actions">
					<button class="action-btn">
						<i class="fas fa-ellipsis-h"></i>
					</button>
				</div>
			</div>
			<div class="chart-container">
				<div class="chart-placeholder">
					<img src="https://via.placeholder.com/300x300?text=Gráfico+de+Pizza" alt="Chart">
				</div>
			</div>
		</div>
	</div>
	<!-- Recent Activity -->
	<div class="activity-card">
		<div class="card-header">
			<h3>Atividade Recente</h3>
			<div class="card-actions">
				<button class="action-btn">
					<i class="fas fa-ellipsis-h"></i>
				</button>
			</div>
		</div>
		<div class="activity-list">
			<div class="activity-item">
				<div class="activity-icon success">
					<i class="fas fa-user-plus"></i>
				</div>
				<div class="activity-content">
					<div class="activity-title">Novo usuário registrado</div>
					<div class="activity-description">João Silva se registrou no sistema</div>
					<div class="activity-time">2 minutos atrás</div>
				</div>
			</div>
			<div class="activity-item">
				<div class="activity-icon primary">
					<i class="fas fa-file-upload"></i>
				</div>
				<div class="activity-content">
					<div class="activity-title">Novo relatório enviado</div>
					<div class="activity-description">Relatório financeiro do mês de Junho</div>
					<div class="activity-time">1 hora atrás</div>
				</div>
			</div>
			<div class="activity-item">
				<div class="activity-icon warning">
					<i class="fas fa-exclamation-circle"></i>
				</div>
				<div class="activity-content">
					<div class="activity-title">Problema reportado</div>
					<div class="activity-description">Problema no módulo de relatórios</div>
					<div class="activity-time">3 horas atrás</div>
				</div>
			</div>
			<div class="activity-item">
				<div class="activity-icon danger">
					<i class="fas fa-bug"></i>
				</div>
				<div class="activity-content">
					<div class="activity-title">Bug corrigido</div>
					<div class="activity-description">Correção no login de usuários</div>
					<div class="activity-time">Ontem</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Clientes Section -->
<section id="clientes-section" class="content-section" style="display:none;">
	<h2>Clientes Segurados</h2>
	<p>Conteúdo da área de clientes segurados.</p>
</section>

<!-- Apólices Section -->
<section id="apolices-section" class="content-section" style="display:none;">
	<h2>Apólices</h2>
	<p>Conteúdo da área de apólices.</p>
</section>

<!-- Contratos Section -->
<section id="contratos-section" class="content-section" style="display:none;">
	<h2>Contratos</h2>
	<p>Conteúdo da área de contratos.</p>
</section>

<!-- Ocorrências Section -->
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


<!-- Sessão de faturas -->
<section id="faturas-section" class="content-section" style="display:none;">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h2>Geração de Faturas</h2>
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
			<tr>
				<td>1</td>
				<td>Lucio</td>
				<td>20000</td>
				<td>2024-06-01</td>
				<td>2024-06-15</td>
				<td><span class="badge bg-success">Paga</span></td>
				<td>
					<button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
					<button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
				</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Jairo</td>
				<td>20000</td>
				<td>2024-06-05</td>
				<td>2024-06-20</td>
				<td><span class="badge bg-warning text-dark">Pendente</span></td>
				<td>
					<button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
					<button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
				</td>
			</tr>
		</tbody>
	</table>

	<!-- Modal Nova Fatura -->
	<div class="modal fade" id="novaFaturaModal" tabindex="-1" aria-labelledby="novaFaturaModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="fatura-form">
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
								<option value="1">Lucio</option>
								<option value="2">Jairo</option>
								<option value="3">Inocencio</option>
							</select>
						</div>
						<div class="form-group mb-2">
							<label for="valor_fatura">Valor</label>
							<input type="number" step="0.01" id="valor_fatura" name="valor" class="form-control" placeholder="Ex: 1200.00" required>
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
</section>

<!-- Sessão de pagamento -->
<section id="pagamentos-section" class="content-section" style="display:none;">
	<h2>Pagamentos</h2>
	<p>Conteúdo da área de pagamentos.</p>
</section>

<!-- Sessão Sinistro -->
<section id="sinistros-section" class="content-section" style="display:none;">
	<h2>Sinistros</h2>
	<p>Conteúdo da área de sinistros.</p>
</section>

<!-- Relatórios Financeiros  -->
<section id="relatorios-financeiros-section" class="content-section" style="display:none;">
	<h2>Relatórios Financeiros</h2>
	<p>Conteúdo da área de relatórios financeiros.</p>
</section>

<!-- Relatórios de Ocorrências  -->
<section id="relatorios-ocorrencias-section" class="content-section" style="display:none;">
	<h2>Relatórios de Ocorrências</h2>
	<p>Conteúdo da área de relatórios de ocorrências.</p>
</section>

<!-- Configurações  -->
<section id="configuracoes-section" class="content-section" style="display:none;">
	<h2>Configurações do Sistema</h2>
	<p>Conteúdo da área de configurações do sistema.</p>
</section>

<!-- Perfil  -->
<section id="perfil-section" class="content-section" style="display:none;">
	<h2>Perfil do Usuário</h2>
	<p>Conteúdo da área de perfil do usuário.</p>
</section>

<!-- Ajuda  -->
<section id="ajuda-section" class="content-section" style="display:none;">
	<h2>Ajuda</h2>
	<p>Conteúdo da área de ajuda.</p>
</section>

@endsection