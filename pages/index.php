<?php
include '../includes/header.php';
?>

<main class="flex-grow-1">
    <section class="categories container my-5">
        <div class="row gy-5">
            <?php
            include '../includes/produtos.php';
            // Renderiza os carrosseis
            render_product_carousel('Popular', 'Livros Populares', $produtos['popular'], 5);
            render_product_carousel('Novidades', 'Novidades', $produtos['novidades'], 5);
            render_product_carousel('EmBreve', 'Em Breve', $produtos['em_breve'], 5);
            ?>
        </div>
    </section>
</main>
    
</main>
<?php
include '../includes/footer.php';
?>