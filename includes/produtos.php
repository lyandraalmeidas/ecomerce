<?php
// Array de exemplo para simular dados de produtos
$produtos = [
    'popular' => [
        ['id' => 1, 'titulo' => 'O Pequeno Príncipe', 'autor' => 'Antoine Saint-Exupery', 'genero' => 'Fábula, Ficção especulativa', 'preco' => '45,90', 'imagem' => '../IMGS/OPequenoPrincipe.jpg'],
        ['id' => 2, 'titulo' => '1984', 'autor' => 'George Orwell', 'genero' => 'Distopia, Ficção científica', 'preco' => '39,90', 'imagem' => '../IMGS/1984.jpg'],
        ['id' => 3, 'titulo' => 'O Senhor dos Anéis', 'autor' => 'J.R.R. Tolkien', 'genero' => 'Fantasia épica', 'preco' => '89,90', 'imagem' => '../IMGS/OSenhorDosAneis.jpg'],
        // ... outros produtos
    ],
    // ... outras categorias
];

/**
 * Função para renderizar um carrossel de produtos
 */
function render_product_carousel($id, $titulo, $items, $items_per_slide = 5) {
    $total_items = count($items);
    $total_slides = ceil($total_items / $items_per_slide);
    ?>
    <div class="col-12">
        <h2 class="h4 mb-4 text-center text-md-start"><?php echo $titulo; ?></h2>
        <div id="carousel<?php echo $id; ?>" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
                <?php for ($i = 0; $i < $total_slides; $i++): ?>
                    <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                        <div class="row g-3 justify-content-center justify-content-md-start">
                            <?php
                            $start_index = $i * $items_per_slide;
                            $end_index = min($start_index + $items_per_slide, $total_items);
                            for ($j = $start_index; $j < $end_index; $j++):
                                $item = $items[$j];
                            ?>
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="card product-card shadow-sm h-100">
                                        <img src="<?php echo $item['imagem']; ?>" class="card-img-top" alt="<?php echo $item['titulo']; ?>">
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title text-truncate"><?php echo $item['titulo']; ?></h6>
                                            <p class="card-text small text-muted mb-2 text-truncate"><?php echo $item['autor']; ?> · <?php echo $item['genero']; ?></p>
                                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                                <?php if ($item['preco'] !== 'Em breve'): ?>
                                                    <strong class="text-primary">R$<?php echo $item['preco']; ?></strong>
                                                    <a href="produto.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-primary">Ver</a>
                                                <?php else: ?>
                                                    <strong class="text-muted"><?php echo $item['preco']; ?></strong>
                                                    <a href="#" class="btn btn-sm btn-outline-secondary">Avisar-me</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            
            <?php if ($total_slides > 1): ?>
                <button class="carousel-control-prev d-none d-md-flex" type="button" data-bs-target="#carousel<?php echo $id; ?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next d-none d-md-flex" type="button" data-bs-target="#carousel<?php echo $id; ?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            <?php endif; ?>
        </div>
    </div>
    <?php
}
?>