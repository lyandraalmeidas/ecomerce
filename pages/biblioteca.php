
biblioteca.php
<?php
// Inclui o cabeçalho (que já inicia a sessão e define $is_logged_in)
include_once '../includes/header.php';

// Redireciona se não estiver logado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// --- Lógica da Biblioteca (Placeholder) ---
// Em um projeto real, estes dados viriam de uma consulta ao banco de dados
// para buscar os livros comprados pelo $_SESSION['user_id']
$livros_comprados = [
    ['id' => 1, 'titulo' => 'Dom Casmurro', 'autor' => 'Machado de Assis', 'imagem' => '../IMGS/book1.jpg', 'link_leitura' => '#'],
    ['id' => 2, 'titulo' => 'O Pequeno Príncipe', 'autor' => 'Antoine de Saint-Exupéry', 'imagem' => '../IMGS/book2.jpg', 'link_leitura' => '#'],
    ['id' => 3, 'titulo' => '1984', 'autor' => 'George Orwell', 'imagem' => '../IMGS/book3.jpg', 'link_leitura' => '#'],
    ['id' => 4, 'titulo' => 'A Revolução dos Bichos', 'autor' => 'George Orwell', 'imagem' => '../IMGS/book4.jpg', 'link_leitura' => '#'],
    ['id' => 5, 'titulo' => 'Cem Anos de Solidão', 'autor' => 'Gabriel García Márquez', 'imagem' => '../IMGS/book5.jpg', 'link_leitura' => '#'],
];

?>

<main class="container my-5">
    <h1 class="mb-4 text-center">Minha Biblioteca</h1>
    <p class="text-center text-muted mb-5">Seus eBooks comprados estão disponíveis para leitura aqui.</p>

    <?php if (empty($livros_comprados)): ?>
        <div class="alert alert-warning text-center" role="alert">
            Você ainda não comprou nenhum eBook. <a href="/" class="alert-link">Explore nosso catálogo!</a>
        </div>
    <?php else: ?>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4">
            <?php foreach ($livros_comprados as $livro): ?>
                <div class="col">
                    <div class="card h-100 product-card shadow-sm">
                        <img src="<?php echo $livro['imagem']; ?>" class="card-img-top" alt="<?php echo $livro['titulo']; ?>">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title text-truncate" title="<?php echo $livro['titulo']; ?>"><?php echo $livro['titulo']; ?></h6>
                            <p class="card-text small text-muted mb-3 text-truncate"><?php echo $livro['autor']; ?></p>
                            <div class="mt-auto d-grid">
                                <a href="<?php echo $livro['link_leitura']; ?>" class="btn btn-sm btn-primary">
                                    <i class="bi bi-book me-1"></i> Ler Agora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php
include '../includes/footer.php';
?>
    </body>
</html>
