<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('../css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <i class="fas fa-shield-alt"></i>
                    <span>Sistema Seguro</span>
                </div>
                <button class="sidebar-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-title">Principal</div>
                    <a href="#" class="nav-link active" data-section="dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="nav-link" data-section="clientes">
                        <i class="fas fa-user-shield"></i>
                        <span>Clientes Segurados</span>
                    </a>
                    <a href="#" class="nav-link" data-section="apolices">
                        <i class="fas fa-briefcase"></i>
                        <span>Apólices</span>
                    </a>
                    <a href="#" class="nav-link" data-section="contratos">
                        <i class="fas fa-file-signature"></i>
                        <span>Contratos</span>
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-title">Operações</div>
                    <a href="#" class="nav-link" data-section="ocorrencias">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>Cadastro de Ocorrências</span>
                    </a>
                    <a href="#" class="nav-link" data-section="faturas">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Geração de Faturas</span>
                    </a>
                    <a href="#" class="nav-link" data-section="pagamentos">
                        <i class="fas fa-money-check-alt"></i>
                        <span>Pagamentos</span>
                    </a>
                    <a href="#" class="nav-link" data-section="sinistros">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Sinistros</span>
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-title">Relatórios</div>
                    <a href="#" class="nav-link" data-section="relatorios-financeiros">
                        <i class="fas fa-chart-bar"></i>
                        <span>Relatórios Financeiros</span>
                    </a>
                    <a href="#" class="nav-link" data-section="relatorios-ocorrencias">
                        <i class="fas fa-chart-line"></i>
                        <span>Relatórios de Ocorrências</span>
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-title">Configurações</div>
                    <a href="#" class="nav-link" data-section="configuracoes">
                        <i class="fas fa-cog"></i>
                        <span>Configurações do Sistema</span>
                    </a>
                    <a href="#" class="nav-link" data-section="perfil">
                        <i class="fas fa-user-cog"></i>
                        <span>Perfil do Usuário</span>
                    </a>
                    <a href="#" class="nav-link" data-section="ajuda">
                        <i class="fas fa-question-circle"></i>
                        <span>Ajuda</span>
                    </a>
                </div>
            </nav>

            <div class="sidebar-footer">
                <div class="user-profile">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" class="user-avatar">
                    <div class="user-info">
                        <div class="user-name">Inocencio Bumba</div>
                        <div class="user-role">Administrador</div>
                    </div>
                    <button class="user-menu">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
                <a href="#" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span>
                   
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="main-header">
                <div class="header-title">
                    <h1>Dashboard</h1>
                    <div class="breadcrumb">Home / Dashboard</div>
                </div>
                <div class="header-actions">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Pesquisar...">
                    </div>
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">4</span>
                    </button>
                    <button class="user-btn">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User">
                    </button>
                </div>
            </header>

            <div class="content-wrapper">
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
        </main>
        
    </div>
</body>
</html>
