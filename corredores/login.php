<?php
// Inclui o arquivo de conexão com o banco de dados
require 'db.php';

// Inicia a sessão para gerenciar informações do usuário
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta o email e a senha do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara uma consulta para buscar o corredor pelo email
    $stmt = $pdo->prepare("SELECT * FROM corredores WHERE email = ?");
    $stmt->execute([$email]);
    $corredor = $stmt->fetch(PDO::FETCH_ASSOC); // Obtém os dados do corredor

    // Verifica se o corredor existe e se a senha está correta
    if ($corredor && password_verify($senha, $corredor['senha'])) {
        // Se tudo estiver certo, armazena o ID do corredor na sessão
        $_SESSION['corredor_id'] = $corredor['id'];
        // Redireciona para a página dos corredores
        header('Location: corredores.php');
    } else {
        // Se houver erro, exibe uma mensagem
        $erro = "Email ou senha incorretos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Corredores</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="text-center" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; padding: 4rem 0;">
        <div class="container">
            <h1>Bem-vindo ao Portal de Corredores</h1>
            <p>Entre para acessar sua conta e ver sua performance.</p>
        </div>
    </div>

    <!-- Formulário de Login -->
    <div class="container mt-5 mb-5">
        <div class="w-full max-w-md mx-auto bg-white shadow-lg p-8 rounded-lg">
            <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>
            <?php if (isset($erro)) { echo "<div class='alert alert-danger text-center'>$erro</div>"; } ?>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Seu email" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Sua senha" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Entrar</button>
            </form>
            <p class="text-center mt-4">Não tem uma conta? <a href="cadastro.php" class="text-blue-600">Cadastre-se aqui</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p>&copy; 2024 Corredores. Todos os direitos reservados.</p>
            <p>
                <a href="#">Termos de Uso</a> | 
                <a href="#">Política de Privacidade</a> | 
                <a href="#">Contato</a>
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
