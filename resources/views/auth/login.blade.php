<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Seguro - Login</title>
    <link rel="stylesheet" href="{{ asset('../css/login.css') }}">
</head>
<body>
    <div class="toast-viewport">
        <ol class="toast-container">
            @if ($errors->any())
            <div>
                <strong>{{ $errors->first() }}</strong>
            </div>
        @endif
        </ol>
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="card-header">
                <div class="logo-container">
                    <svg class="login-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" x2="3" y1="12" y2="12"></line>
                    </svg>
                </div>
                <h1 class="card-title">Sistema de Contabilidade</h1>
                <p class="card-description">Faça login para acessar o sistema</p>
            </div>

            <div class="card-content">
                <form class="login-form" method="POST" action="/login">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="admin@sistema.com" required >
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required>
                    </div>

                    <p><a href="#" class="forgot-password">Esqueceu sua senha?"></a></p>
                    <button type="submit" class="login-button" ><a href="dashboard">Entrar</button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
