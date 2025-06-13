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