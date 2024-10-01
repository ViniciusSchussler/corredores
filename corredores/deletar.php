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

// Verifica se o ID do corredor a ser deletado foi passado na URL
if (!isset($_GET['id'])) {
    // Se não houver ID, redireciona para a lista de corredores
    header('Location: corredores.php');
    exit();
}

// Armazena o ID do corredor que será deletado
$id = $_GET['id'];

// Deletar logs relacionados ao corredor
$stmt_log = $pdo->prepare("DELETE FROM log WHERE usuario_id = ?"); // Prepara a consulta
$stmt_log->execute([$id]); // Executa a consulta, passando o ID do corredor

// Deletar o corredor
$stmt = $pdo->prepare("DELETE FROM corredores WHERE id = ?"); // Prepara a consulta
$stmt->execute([$id]); // Executa a consulta, passando o ID do corredor

// Redireciona para a lista de corredores após a exclusão
header('Location: corredores.php');
exit(); // Para garantir que o script não continue
?>
