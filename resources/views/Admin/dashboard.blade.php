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
                    <a href="#" class="nav-link" data-section="ocorrencias" id="ocorrencias-link">
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
                    <h1 id="main-title">Dashboard</h1>
                    <div class="breadcrumb" id="main-breadcrumb">Home / Dashboard</div>
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
            <!-- @yield('content') -->
             <div class="content-wrapper">
                <!-- Dashboard Section -->
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
                    <form id="ocorrencia-form" class="ocorrencia-form" >
                        @csrf
                        <div class="form-group">
                            <label for="cliente">Cliente Segurado</label>
                            <select id="cliente" name="cliente_id" class="form-control" required>
                                <option value="">Selecione o cliente</option>
                                <option value="1">Lucio</option>
                                <option value="2">Jairo</option>
                                <option value="3">Inocencio</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="apolice">Apólice</label>
                            <select id="apolice" name="apolice_id" class="form-control" required>
                                <option value="">Selecione a apólice</option>
                                <option value="101">Apolice #101</option>
                                <option value="102">Apolice #102</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo de Ocorrência</label>
                            <select id="tipo" name="tipo" class="form-control" required>
                                <option value="">Selecione o tipo</option>
                                <option value="acidente">Acidente</option>
                                <option value="roubo">Roubo/Furto</option>
                                <option value="incendio">Incêndio</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="data_ocorrencia">Data da Ocorrência</label>
                            <input type="date" id="data_ocorrencia" name="data_ocorrencia" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="local">Local da Ocorrência</label>
                            <input type="text" id="local" name="local" class="form-control" placeholder="Ex: Rua da cash" required>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" name="descricao" class="form-control" rows="4" placeholder="Descreva detalhadamente a ocorrência" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="anexos">Anexar Documentos (opcional)</label>
                            <input type="file" id="anexos" name="anexos[]" class="form-control" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar Ocorrência</button>
                    </form>

                    <hr>

                    <h3>Ocorrências Recentes</h3>
                    <table class="ocorrencias-table">
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
                            <tr>
                                <td>1</td>
                                <td>Lucio</td>
                                <td>Acidente</td>
                                <td>2024-06-10</td>
                                <td><span class="status status-aberto">Aberto</span></td>
                                <td>
                                    <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jairo</td>
                                <td>Roubo/Furto</td>
                                <td>2024-06-08</td>
                                <td><span class="status status-fechado">Fechado</span></td>
                                <td>
                                    <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Sessão de faturas -->
                <section id="faturas-section" class="content-section" style="display:none;">
                    <h2>Geração de Faturas</h2>
                    <p>Conteúdo da área de geração de faturas.</p>
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

        </div>
        </main>
    </div>

   
    <script src="{{ asset('../js/main.js') }}"></script>
</body>

</html>