<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
      @stack('styles')
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
                    <a href="home" class="nav-link active" data-section="dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="clientes" class="nav-link" >
                        <i class="fas fa-users"></i>
                        <span>Clientes</span>
                    </a>
                    <a href="#" class="nav-link" data-section="planosContas">
                        <i class="fas fa-user-shield"></i>
                        <span>Plano de Contas</span>
                    </a>
                    <a href="#" class="nav-link" data-section="apolices">
                        <i class="fas fa-briefcase"></i>
                        <span>Lançamento</span>
                    </a>
                    <a href="#" class="nav-link" data-section="contratos">
                        <i class="fas fa-file-signature"></i>
                        <span>Relatorios</span>
                    </a>
                </div>

                <div class="nav-section">
                    <div class="nav-title">Operações</div>
                     <a href="ocorrencias" class="nav-link" >
                        <i class="fas fa-users"></i>
                        <span>Cadastro de Ocorrencias</span>
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
                        <div class="user-name">{{auth()->user()->name}}</div>
                        <div class="user-role">{{auth()->user()->role}}</div>
                    </div>
                    <button class="user-menu">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Sair</span>
                    </button>
                </form>
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
            @yield('content')
        </div>
        </main>

    </div>

    {{-- <script src="{{ asset('../js/main.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    @livewireScripts
</body>

</html>
