 document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            const sections = document.querySelectorAll('.content-section');
            const mainTitle = document.getElementById('main-title');
            const mainBreadcrumb = document.getElementById('main-breadcrumb');

            //Mapa de sessão e titulo para breadcrumb

            const sectionTitles = {
                'dashboard': 'Dashboard',
                'clientes': 'Clientes Segurados',
                'apolices': 'Apólices',
                'contratos': 'Contratos',
                'ocorrencias': 'Cadastro de Ocorrências',
                'faturas': 'Geração de Faturas',
                'pagamentos': 'Pagamentos',
                'sinistros': 'Sinistros',
                'relatorios-financeiros': 'Relatórios Financeiros',
                'relatorios-ocorrencias': 'Relatórios de Ocorrências',
                'configuracoes': 'Configurações do Sistema',
                'perfil': 'Perfil do Usuário',
                'ajuda': 'Ajuda'
            };

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    //Remover uma Sessão
                    sections.forEach(section => section.style.display = 'none');

                    // Mostrar Sessão
                    const section = document.getElementById(this.dataset.section + '-section');
                    if (section) {
                        section.style.display = '';
                    }

                    // Atualizar titulo e breadcrumb
                    const title = sectionTitles[this.dataset.section] || 'Dashboard';
                    mainTitle.textContent = title;
                    mainBreadcrumb.textContent = 'Home / ' + title;
                });
            });
        });