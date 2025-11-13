<?php
// Inicia a sessão se ainda não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Variável para verificar se o usuário está logado
$is_logged_in = isset($_SESSION['user_id']);
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eBooksCloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<header class="cabecalho">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">eBooksCloud</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex search-form mx-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar livros, autores...">
                    <button class="btn search-btn" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <div class="nav-actions ms-lg-auto mt-3 mt-lg-0">
                    <?php if ($is_logged_in): ?>
                    <a href="../pages/carrinho.php" class="nav-action-btn cart-btn">
                        <i class="bi bi-cart3"></i>
                        <span class="d-none d-md-inline">Carrinho</span>
                    </a>
                    <?php endif; ?>
                    <a href="../pages/login.php" class="nav-action-btn login-btn">
                        <i class="bi bi-person-circle"></i>
                        <span class="d-none d-md-inline">Login</span>
                    </a>
                    <a href="../pages/cadastro.php" class="nav-action-btn cadastro-btn">
                        <i class="bi bi-person-plus"></i>
                        <span class="d-none d-md-inline">Cadastrar</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>