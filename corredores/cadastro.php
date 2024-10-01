<?php
// Incluindo arquivos necessários
require 'db.php'; // Arquivo de conexão com o banco de dados
require 'corredor.class.php'; // Classe Corredor

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturando os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $tempo = $_POST['tempo'];
    // Criptografando a senha para segurança
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Criando um novo corredor com os dados capturados
    $corredor = new Corredor($nome, $email, $idade, $tempo, $senha);
    // Salvando o corredor no banco de dados
    $corredor->salvar($pdo);

    // Redireciona para a página de login após o cadastro
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro de Corredor</title>
</head>
<body>
    <!-- Barra de navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Corredores</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Seção de boas-vindas -->
    <div class="text-center" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; padding: 4rem 0;">
        <div class="container">
            <h1>Cadastre-se no Time de Corredores</h1>
            <p>Faça parte de uma comunidade de corredores e melhore seu desempenho.</p>
        </div>
    </div>

    <!-- Formulário de Cadastro -->
    <div class="container mt-5 mb-5">
        <div class="w-full max-w-md mx-auto bg-white shadow-lg p-8 rounded-lg">
            <h2 class="text-2xl font-semibold text-center mb-6">Cadastre-se</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Seu email" required>
                </div>
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" class="form-control" id="idade" name="idade" placeholder="Sua idade" required>
                </div>
                <div class="form-group">
                    <label for="tempo">Tempo (min):</label>
                    <input type="number" class="form-control" id="tempo" name="tempo" placeholder="Tempo de corrida" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Sua senha" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Cadastrar</button>
            </form>
            <p class="text-center mt-4">Já tem uma conta? <a href="login.php" class="text-blue-600">Faça login</a></p>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="text-center" style="background-color: #f8f9fa; padding: 2rem 0;">
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
