<?php
// pages/login.php

// Inclui o cabeçalho (que já inicia a sessão e define $is_logged_in)
include_once '../includes/header.php';

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lógica de processamento do formulário de login (Ainda sem autenticação real)
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Neste ponto, você faria a verificação no banco de dados.
    // Por enquanto, apenas um placeholder de sucesso/erro.
    
    // Exemplo de lógica de sucesso (apenas para demonstração)
    if ($email === 'teste@exemplo.com' && $password === '123456') {
        // Define a sessão de login (substitua pela sua lógica real)
        $_SESSION['user_id'] = 1; 
        $_SESSION['user_email'] = $email;
        
        // Redireciona para a página inicial ou painel
        header('Location: /');
        exit;
    } else {
        $error_message = "E-mail ou senha incorretos. Tente novamente.";
    }
}

// Se o usuário já estiver logado, redireciona para a página inicial
if (isset($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}

// O restante do HTML da página de login
?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="cadastro-container">
                <div class="cadastro-header text-center mb-4">
                    <h1 class="h3">Acesse sua Conta</h1>
                    <p class="text-muted">Entre com seu e-mail e senha para continuar.</p>
                </div>

                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

                <form class="cadastro-form" method="POST" action="login.php">
                    <div class="form-group">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="seu.email@exemplo.com">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Sua senha">
                    </div>
                    
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>

                    <div class="text-center">
                        <a href="#" class="text-decoration-none">Esqueceu sua senha?</a>
                    </div>
                </form>

                <hr class="my-4">

                <div class="text-center">
                    <p>Ainda não tem conta? <a href="cadastro.php" class="text-decoration-none">Cadastre-se aqui</a></p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include '../includes/footer.php';
?>
    </body>
</html>