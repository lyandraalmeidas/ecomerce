<?php
// includes/header.php
?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quindle</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.4/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>

    <header class="cabecalho">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="../IMGS/logo.png" alt="Logo da Livraria Virtual" width="100" height="50" class="d-inline-block align-text-top">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex search-form" role="search" action="#" method="get" aria-label="Formulário de busca">
                        <input class="form-control me-2" type="search" name="q" placeholder="Buscar livros, autores..." aria-label="Buscar">
                        <button class="btn btn-outline-light" type="submit" aria-label="Enviar busca">
                            <i class="bi bi-search" aria-hidden="true"></i>
                        </button>
                    </form>

                    <div class="nav-actions ms-auto">
                        <a href="#" class="nav-action-btn cart-btn">
                            <i class="bi bi-cart3" aria-hidden="true"></i>
                            <span class="d-none d-md-inline">Carrinho</span>
                        </a>
                        <a href="#" class="nav-action-btn login-btn">
                            <i class="bi bi-person-circle" aria-hidden="true"></i>
                            <span class="d-none d-md-inline">Login</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>