<?php
session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $cpf = $_POST['cpf'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha

    // Prevenir SQL injection
    $email = $conn->real_escape_string($email);
    $name = $conn->real_escape_string($name);
    $surname = $conn->real_escape_string($surname);
    $age = $conn->real_escape_string($age);
    $gender = $conn->real_escape_string($gender);
    $cpf = $conn->real_escape_string($cpf);

    $sql = "INSERT INTO users (email, name, surname, age, gender, cpf, password) 
            VALUES ('$email', '$name', '$surname', '$age', '$gender', '$cpf', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        header("Location: ../index.php");
        exit();
    } else {
        $error = "Erro: " . $conn->error;
    }
}
?>

<?php include '../includes/header.php'; ?>

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="cadastro-container">
                <div class="cadastro-header text-center mb-4">
                    <h1 class="h3">Criar sua conta</h1>
                    <p class="text-muted">Preencha os dados abaixo para se cadastrar</p>
                </div>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="cadastro.php" class="cadastro-form">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Nome *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="surname" class="form-label">Sobrenome *</label>
                                <input type="text" class="form-control" id="surname" name="surname" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="age" class="form-label">Idade *</label>
                                <input type="number" class="form-control" id="age" name="age" min="1" max="120" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender" class="form-label">Gênero *</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">Selecionar</option>
                                    <option value="male">Masculino</option>
                                    <option value="female">Feminino</option>
                                    <option value="other">Outro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cpf" class="form-label">CPF *</label>
                                <input type="text" class="form-control" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="000.000.000-00" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Senha *</label>
                        <input type="password" class="form-control" id="password" name="password" minlength="6" required>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                    </div>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            Já tem uma conta? <a href="login.php" class="text-decoration-none">Faça login</a>
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>