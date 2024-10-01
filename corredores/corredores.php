<?php
// Inclui os arquivos necessários para a conexão com o banco de dados e a classe Corredor
require 'db.php'; // Conexão com o banco de dados
require 'corredor.class.php'; // Classe que representa os corredores

// Inicia a sessão para rastrear usuários logados
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['corredor_id'])) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: login.php');
    exit(); // Para o script para garantir que não haja mais execução
}

// Carrega todos os corredores do banco de dados
$corredores = Corredor::todos($pdo);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Corredores</title>
</head>
<body>
    <!-- Barra de navegação -->
    <nav>
        <div>
            <a href="#">Corredores</a>
            <ul>
                <li>
                    <a href="logout.php">Sair</a> <!-- Botão de sair -->
                </li>
            </ul>
        </div>
    </nav>

    <!-- Seção de boas-vindas -->
    <div>
        <h1>Lista de Corredores</h1> <!-- Título da página -->
        <p>Veja todos os corredores cadastrados e seus tempos de corrida.</p> <!-- Descrição -->
    </div>

    <!-- Tabela com a lista de corredores -->
    <div>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Idade</th>
                    <th>Tempo (min)</th>
                    <th>Ações</th> <!-- Coluna para ações -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($corredores as $corredor) : ?> <!-- Para cada corredor, cria uma linha na tabela -->
                    <tr>
                        <td><?= htmlspecialchars($corredor['nome']) ?></td> <!-- Nome do corredor -->
                        <td><?= htmlspecialchars($corredor['email']) ?></td> <!-- Email do corredor -->
                        <td><?= htmlspecialchars($corredor['idade']) ?></td> <!-- Idade do corredor -->
                        <td><?= htmlspecialchars($corredor['tempo']) ?> min</td> <!-- Tempo do corredor -->
                        <td>
                            <!-- Botões para editar e deletar -->
                            <a href="editar.php?id=<?= $corredor['id'] ?>">Editar</a>
                            <a href="deletar.php?id=<?= $corredor['id'] ?>">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?> <!-- Fim do loop -->
            </tbody>
        </table>
    </div>

    <!-- Rodapé -->
    <footer>
        <div>
            <p>&copy; 2024 Corredores. Todos os direitos reservados.</p>
            <p>
                <a href="#">Termos de Uso</a> | 
                <a href="#">Política de Privacidade</a> | 
                <a href="#">Contato</a>
            </p>
        </div>
    </footer>
</body>
</html>
