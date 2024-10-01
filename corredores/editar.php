<?php
// Inclui o arquivo de conexão com o banco de dados
require 'db.php'; 

// Inicia a sessão para acessar informações do usuário logado
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['corredor_id'])) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: login.php');
    exit(); // Para garantir que o script não continue
}

// Verifica se o ID do corredor a ser editado foi passado na URL
if (!isset($_GET['id'])) {
    // Se não houver ID, redireciona para a lista de corredores
    header('Location: corredores.php');
    exit();
}

// Armazena o ID do corredor
$id = $_GET['id'];

// Busca o corredor pelo ID no banco de dados
$stmt = $pdo->prepare("SELECT * FROM corredores WHERE id = ?");
$stmt->execute([$id]);
$corredor = $stmt->fetch(PDO::FETCH_ASSOC); // Obtém os dados do corredor

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $tempo = $_POST['tempo'];

    // Atualiza os dados do corredor no banco de dados
    $stmt = $pdo->prepare("UPDATE corredores SET nome = ?, email = ?, idade = ?, tempo = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $idade, $tempo, $id]);

    // Registra a alteração no log
    $usuario_id = $_SESSION['corredor_id'];
    $data_hora = date('Y-m-d H:i:s'); // Captura a data e hora atual
    $stmt_log = $pdo->prepare("INSERT INTO log (usuario_id, acao, data_hora) VALUES (?, 'Alterou corredor com ID $id', ?)");
    $stmt_log->execute([$usuario_id, $data_hora]);

    // Redireciona para a lista de corredores após a atualização
    header('Location: corredores.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Corredor</title>
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
                        <a class="nav-link" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="text-center" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; padding: 4rem 0;">
        <div class="container">
            <h1>Editar Corredor</h1>
            <p>Faça as alterações necessárias.</p>
        </div>
    </div>

    <!-- Formulário de Edição -->
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($corredor['nome']) ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($corredor['email']) ?>" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="number" class="form-control" id="idade" name="idade" value="<?= htmlspecialchars($corredor['idade']) ?>" required>
            </div>
            <div class="form-group">
                <label for="tempo">Tempo (min):</label>
                <input type="number" class="form-control" id="tempo" name="tempo" value="<?= htmlspecialchars($corredor['tempo']) ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="corredores.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <!-- Footer -->
    <footer class="text-center">
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
