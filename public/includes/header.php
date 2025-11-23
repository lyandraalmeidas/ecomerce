<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$is_logged_in = isset($_SESSION['user_id']);
// calcula base URL até a pasta /public (ex: /ecommerce/public)
$scriptPath = $_SERVER['SCRIPT_NAME'] ?? '';
$posPublic = strpos($scriptPath, '/public');
if ($posPublic !== false) {
    $base = substr($scriptPath, 0, $posPublic + 7); // inclui '/public'
} else {
    // fallback para raiz
    $base = '';
}

// detecta página atual
$currentPage = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>
<!-- Carrega CSS necessário quando a view é acessada diretamente -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $base; ?>/CSS/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.4/font/bootstrap-icons.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<header class="cabecalho">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $base ?: '/'; ?>">eBooksCloud</a>
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
                        <a href="<?php echo $base; ?>/Views/Index/carrinho.php" class="nav-action-btn cart-btn">
                            <i class="bi bi-cart3"></i>
                            <span class="d-none d-md-inline">Carrinho</span>
                        </a>
                        <a href="<?php echo $base; ?>/Views/Index/perfil.php" class="nav-action-btn perfil-btn">
                            <i class="bi bi-person-circle"></i>
                            <span class="d-none d-md-inline">Perfil</span>
                        </a>
                        <a href="<?php echo $base; ?>/Actions/logout_action.php" class="nav-action-btn logout-btn">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="d-none d-md-inline">Sair</span>
                        </a>
                    <?php else: ?>
                        <?php if ($currentPage === 'cadastro.php' || str_contains($_SERVER['REQUEST_URI'], 'cadastro.php')): ?>
                            <!-- Na página de CADASTRO, mostrar apenas LOGIN -->
                            <a href="<?php echo $base; ?>/Views/Index/login.php" class="nav-action-btn login-btn">
                                <i class="bi bi-person-circle"></i>
                                <span class="d-none d-md-inline">Login</span>
                            </a>
                        <?php elseif ($currentPage === 'login.php' || str_contains($_SERVER['REQUEST_URI'], 'login.php')): ?>
                            <!-- Na página de LOGIN, mostrar apenas CADASTRAR -->
                            <a href="<?php echo $base; ?>/Views/Index/cadastro.php" class="nav-action-btn cadastro-btn">
                                <i class="bi bi-person-plus"></i>
                                <span class="d-none d-md-inline">Cadastrar</span>
                            </a>
                        <?php else: ?>
                            <!-- Em outras páginas mostrar ambos -->
                            <a href="<?php echo $base; ?>/Views/Index/login.php" class="nav-action-btn login-btn">
                                <i class="bi bi-person-circle"></i>
                                <span class="d-none d-md-inline">Login</span>
                            </a>
                            <a href="<?php echo $base; ?>/Views/Index/cadastro.php" class="nav-action-btn cadastro-btn">
                                <i class="bi bi-person-plus"></i>
                                <span class="d-none d-md-inline">Cadastrar</span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>