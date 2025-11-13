<?php
// Inclui o cabeçalho (que já inicia a sessão e define $is_logged_in)
include_once '../includes/header.php';

// Redireciona se não estiver logado (opcional, mas recomendado para carrinho)
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// --- Lógica de Carrinho (Placeholder) ---
// Em um projeto real, estes dados viriam da sessão ou de um banco de dados
$carrinho_items = [
    ['id' => 1, 'titulo' => 'Dom Casmurro', 'preco' => 45.90, 'quantidade' => 1],
    ['id' => 2, 'titulo' => 'O Pequeno Príncipe', 'preco' => 39.90, 'quantidade' => 2],
    ['id' => 3, 'titulo' => '1984', 'preco' => 49.90, 'quantidade' => 1],
];

$subtotal = 0;
foreach ($carrinho_items as $item) {
    $subtotal += $item['preco'] * $item['quantidade'];
}
$frete = 0.00; // Frete grátis para eBooks
$total = $subtotal + $frete;

?>

<main class="container my-5">
    <h1 class="mb-4 text-center">Seu Carrinho de Compras</h1>

    <?php if (empty($carrinho_items)): ?>
        <div class="alert alert-info text-center" role="alert">
            Seu carrinho está vazio. <a href="/" class="alert-link">Continue comprando!</a>
        </div>
    <?php else: ?>
        <div class="row">
            <!-- Coluna de Itens do Carrinho -->
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Produto</th>
                                    <th scope="col" class="text-center">Preço</th>
                                    <th scope="col" class="text-center">Qtd.</th>
                                    <th scope="col" class="text-end">Subtotal</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($carrinho_items as $item): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($item['titulo']); ?></td>
                                        <td class="text-center">R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                                        <td class="text-center">
                                            <input type="number" class="form-control form-control-sm mx-auto" style="width: 70px;" value="<?php echo $item['quantidade']; ?>" min="1">
                                        </td>
                                        <td class="text-end">R$ <?php echo number_format($item['preco'] * $item['quantidade'], 2, ',', '.'); ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-danger" aria-label="Remover item">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="/" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Continuar Comprando</a>
            </div>

            <!-- Coluna de Resumo do Pedido -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Resumo do Pedido</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal:</span>
                                <strong>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Frete:</span>
                                <strong><?php echo $frete > 0 ? 'R$ ' . number_format($frete, 2, ',', '.') : 'Grátis'; ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between fs-5 fw-bold text-primary">
                                <span>Total:</span>
                                <strong>R$ <?php echo number_format($total, 2, ',', '.'); ?></strong>
                            </li>
                        </ul>
                        <div class="d-grid mt-4">
                            <a href="checkout.php" class="btn btn-primary btn-lg">Finalizar Compra</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php
include '../includes/footer.php';
?>
    </body>
</html>
