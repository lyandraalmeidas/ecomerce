<?php
// includes/header.php
?>
<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Livraria Virtual</title>

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
		<!-- Bootstrap Icons -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.4/font/bootstrap-icons.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../CSS/style.css">
	</head>
	<body>

	<header class="cabecalho">
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img src="../IMGS/logo.png" alt="Logo da Livraria Virtual" width="100" height="50" class="d-inline-block align-text-top" style="margin-right: 2rem;">
				</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<!-- Busca (esquerda) -->
					<form class="d-flex me-3" role="search" style="max-width:360px;">
						<input class="form-control me-2" type="search" name="q" placeholder="Buscar livros, autores..." aria-label="Buscar">
						<button class="btn btn-outline-light" type="submit" aria-label="Enviar busca">Buscar</button>
					</form>

					<!-- Itens à direita -->
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-shop" aria-hidden="true"></i> Loja</a></li>
						<li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-cart" aria-hidden="true"></i> Carrinho</a></li>
						<li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-person-circle" aria-hidden="true"></i> Login</a></li>
					</ul>

				</div>
			</div>
		</nav>
	</header>