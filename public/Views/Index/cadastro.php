<?php
$register_err = null;
$email_err = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // coleta e sanitiza entradas
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');
    $data_nasc = $_POST['data_nascimento'] ?? '';

    // validações simples
    if ($password !== $confirm) {
        $register_err = 'As senhas não conferem.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $register_err = 'E-mail inválido.';
    } elseif (empty($name) || empty($cpf) || empty($data_nasc)) {
        $register_err = 'Por favor preencha todos os campos obrigatórios.';
    } elseif (strlen($cpf) !== 11) {
        $register_err = 'CPF deve conter 11 dígitos.';
    } else {
        // conecta ao banco (ajuste conforme suas credenciais)
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=livrariatop;charset=utf8mb4', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // verifica se o e-mail já existe
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM cliente WHERE email = :email');
            $stmt->execute([':email' => $email]);
            $count = (int) $stmt->fetchColumn();

            if ($count > 0) {
                $email_err = 'Este e-mail já está cadastrado.';
            } else {
                // insere usuário (hash de senha)
                $senha_hash = password_hash($password, PASSWORD_DEFAULT);

                $insert = $pdo->prepare('INSERT INTO cliente (nome, cpf, email, telefone, data_nascimento, senha_hash) VALUES (:nome, :cpf, :email, :telefone, :data_nascimento, :senha_hash)');
                $insert->execute([
                    ':nome' => $name,
                    ':cpf' => $cpf,
                    ':email' => $email,
                    ':telefone' => $_POST['telefone'] ?? null,
                    ':data_nascimento' => $data_nasc,
                    ':senha_hash' => $senha_hash
                ]);

                // Registra sessão e redireciona para a página de login
                $_SESSION['user_email'] = $email;
                header('Location: login.php');
                exit;
            }

        } catch (PDOException $e) {
            $register_err = 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
        }
    }
}

// inclui o header (após o possível redirect)
include_once __DIR__ . '/../../includes/header.php';
?>

<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-card">
                    <div class="auth-header text-center">
                        <h2 class="auth-title">Criar Conta</h2>
                        <p class="auth-subtitle">Junte-se à nossa comunidade de leitores</p>
                    </div>
                    
                    <?php if(isset($register_err)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $register_err; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(isset($email_err)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $email_err; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <form method="post" class="auth-form">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo" required value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES); ?>">
                                    <label for="name">Nome Completo</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>">
                                    <label for="email">E-mail</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required maxlength="14" oninput="formatarCPF(this)" value="<?php echo htmlspecialchars($_POST['cpf'] ?? '', ENT_QUOTES); ?>">
                                    <label for="cpf">CPF</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required value="<?php echo htmlspecialchars($_POST['data_nascimento'] ?? '', ENT_QUOTES); ?>">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" maxlength="15" oninput="formatarTelefone(this)" value="<?php echo htmlspecialchars($_POST['telefone'] ?? '', ENT_QUOTES); ?>">
                                    <label for="telefone">Telefone (opcional)</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                                    <label for="password">Senha</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Senha" required>
                                    <label for="confirm_password">Confirmar Senha</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 mt-4 auth-btn">
                            <i class="bi bi-person-plus me-2"></i>
                            Criar Conta
                        </button>

                        <div class="auth-links text-center mt-4">
                            <p class="mb-0">
                                Já tem uma conta? 
                                <a href="login.php" class="auth-link">Faça login aqui</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="../../JS/cadastro.js"></script>
<link rel="stylesheet" href="../../CSS/cadastro.css">

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>