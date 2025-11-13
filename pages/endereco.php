<?php
// pages/endereco.php

// Inclui o cabeçalho (que já inicia a sessão e define $is_logged_in)
include_once '../includes/header.php';

// Redireciona se não estiver logado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// --- Lógica de Endereços (Placeholder) ---
// Em um projeto real, estes dados viriam de uma consulta ao banco de dados
// para buscar os endereços do $_SESSION['user_id']
$enderecos = [
    [
        'id' => 1,
        'nome' => 'Casa Principal',
        'logradouro' => 'Rua das Flores, 123',
        'bairro' => 'Jardim América',
        'cidade' => 'São Paulo',
        'estado' => 'SP',
        'cep' => '01234-567',
        'principal' => true
    ],
    [
        'id' => 2,
        'nome' => 'Trabalho',
        'logradouro' => 'Av. Paulista, 1000, Sala 501',
        'bairro' => 'Bela Vista',
        'cidade' => 'São Paulo',
        'estado' => 'SP',
        'cep' => '09876-543',
        'principal' => false
    ],
];

// Lógica para adicionar/editar (Placeholder)
$edit_mode = false;
$endereco_em_edicao = [];

if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    $edit_mode = true;
    $endereco_id = (int)$_GET['id'];
    // Simula a busca do endereço no array
    foreach ($enderecos as $endereco) {
        if ($endereco['id'] === $endereco_id) {
            $endereco_em_edicao = $endereco;
            break;
        }
    }
}

?>

<main class="container my-5">
    <h1 class="mb-4 text-center">Meus Endereços</h1>

    <div class="row">
        <!-- Coluna de Formulário (Adicionar/Editar) -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><?php echo $edit_mode ? 'Editar Endereço' : 'Adicionar Novo Endereço'; ?></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="endereco.php">
                        <input type="hidden" name="endereco_id" value="<?php echo $endereco_em_edicao['id'] ?? ''; ?>">
                        
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Endereço (Ex: Casa, Trabalho)</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $endereco_em_edicao['nome'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $endereco_em_edicao['cep'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="logradouro" class="form-label">Logradouro (Rua, Avenida, etc.)</label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?php echo $endereco_em_edicao['logradouro'] ?? ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $endereco_em_edicao['bairro'] ?? ''; ?>" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $endereco_em_edicao['cidade'] ?? ''; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $endereco_em_edicao['estado'] ?? ''; ?>" required>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" id="principal" name="principal" <?php echo ($endereco_em_edicao['principal'] ?? false) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="principal">
                                Definir como endereço principal
                            </label>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i> <?php echo $edit_mode ? 'Salvar Alterações' : 'Adicionar Endereço'; ?>
                            </button>
                        </div>
                        <?php if ($edit_mode): ?>
                            <div class="d-grid mt-2">
                                <a href="endereco.php" class="btn btn-outline-secondary">Cancelar Edição</a>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <!-- Coluna de Lista de Endereços -->
        <div class="col-lg-8">
            <?php if (empty($enderecos)): ?>
                <div class="alert alert-info text-center" role="alert">
                    Você ainda não tem endereços cadastrados. Use o formulário ao lado para adicionar um.
                </div>
            <?php else: ?>
                <div class="row row-cols-1 g-4">
                    <?php foreach ($enderecos as $endereco): ?>
                        <div class="col">
                            <div class="card shadow-sm h-100 <?php echo $endereco['principal'] ? 'border-primary border-2' : ''; ?>">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h5 class="card-title mb-1">
                                                <?php echo htmlspecialchars($endereco['nome']); ?>
                                                <?php if ($endereco['principal']): ?>
                                                    <span class="badge bg-primary ms-2">Principal</span>
                                                <?php endif; ?>
                                            </h5>
                                            <p class="card-text text-muted mb-0"><?php echo htmlspecialchars($endereco['logradouro']); ?></p>
                                            <p class="card-text text-muted mb-0"><?php echo htmlspecialchars($endereco['bairro']); ?></p>
                                            <p class="card-text text-muted mb-0"><?php echo htmlspecialchars($endereco['cidade']) . ' - ' . htmlspecialchars($endereco['estado']) . ', ' . htmlspecialchars($endereco['cep']); ?></p>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <a href="endereco.php?action=edit&id=<?php echo $endereco['id']; ?>" class="btn btn-sm btn-outline-primary" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button class="btn btn-sm btn-outline-danger" title="Remover">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php
include '../includes/footer.php';
?>
    </body>