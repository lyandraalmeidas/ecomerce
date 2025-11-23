<?php
    session_start();
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel eBooksCloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="CSS/style.css">

</head>
<body>
    <?php
    include __DIR__ . '/includes/header.php';
    ?>

    <?php
    // Conteúdo principal (home). As páginas de login e cadastro devem ser acessadas diretamente
    // em /Views/Index/login.php e /Views/Index/cadastro.php respectivamente.
    ?>
    <main class="container mt-5">
        <h1 class="text-center mb-4">Bem-vindo à eBooksCloud</h1>
        <p class="text-center mb-4">Acesse <a href="Views/Index/login.php">Login</a> ou <a href="Views/Index/cadastro.php">Cadastro</a> para começar.</p>
    </main>

    <?php
    include __DIR__ . '/includes/footer.php';
    ?>

</body>
</html>