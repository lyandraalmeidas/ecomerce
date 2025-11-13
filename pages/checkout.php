
checkout.php
<?php
// pages/checkout.php

// Inclui o cabeçalho (que já inicia a sessão e define $is_logged_in)
include_once '../includes/header.php';

// Redireciona se não estiver logado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// --- Lógica de Checkout (Placeholder) ---
// Em um projeto real, os dados do carrinho seriam carregados aqui
$subtotal = 135.70;
$frete = 0.00;
$total = $subtotal + $frete;

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lógica de processamento de pagamento e finalização
    // Neste ponto, você processaria o pagamento e registraria a compra no banco de dados.
    
    // Exemplo de sucesso (redireciona para uma página de confirmação)
    // header('Location: confirmacao.php');
    // exit;
    
    $success_message = "Compra simulada com sucesso! Você seria redirecionado para a confirmação.";
}

?>

<main class="container my-5">
    <h1 class="mb-4 text-center">Finalizar Compra</h1>

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success text-center" role="alert">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <!-- Coluna de Informações de Pagamento/Entrega -->
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">1. Informações de Pagamento</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="checkout.php">
                        <!-- Endereço (Simplificado para eBooks) -->
                        <h6 class="mb-3">Endereço de Cobrança</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpf" required>
                            </div>
                            <div class="col-12">
                                <label for="endereco" class="form-label">Endereço (para nota fiscal)</label>
                                <input type="text" class="form-control" id="endereco" placeholder="Rua, Número, Bairro" required>
                            </div>
                        </div>

                        <!-- Detalhes do Cartão (Placeholder) -->
                        <h6 class="mb-3">Detalhes do Cartão</h6>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="card_nome" class="form-label">Nome no Cartão</label>
                                <input type="text" class="form-control" id="card_nome" required>
                            </div>
                            <div class="col-12">
                                <label for="card_numero" class="form-label">Número do Cartão</label>
                                <input type="text" class="form-control" id="card_numero" required>
                            </div>
                            <div class="col-md-4">
                                <label for="card_validade" class="form-label">Validade</label>
                                <input type="text" class="form-control" id="card_validade" placeholder="MM/AA" required>
                            </div>
                            <div class="col-md-4">
                                <label for="card_cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="card_cvv" required>
                            </div>
                        </div>
                        
                        <hr class="my-4">

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Pagar R$ <?php echo number_format($total, 2, ',', '.'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Coluna de Resumo do Pedido -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">Seu Pedido</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal:</span>
                            <strong>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Frete (eBooks):</span>
                            <strong>Grátis</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between fs-5 fw-bold text-primary">
                            <span>Total a Pagar:</span>
                            <strong>R$ <?php echo number_format($total, 2, ',', '.'); ?></strong>
                        </li>
                    </ul>
                    <p class="small text-muted mt-3 text-center">Ao clicar em Pagar, você concorda com nossos Termos de Serviço.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
    </body>
</html>
