<?php
// Configurações para a conexão com o banco de dados
$host = 'localhost'; // Endereço do servidor de banco de dados
$db = 'corredores_db'; // Nome do banco de dados
$user = 'estagiario'; // Nome do usuário do banco de dados
$pass = '123'; // Senha do usuário
$port = '3307'; // Porta onde o banco de dados está escutando

try {
    // Tenta conectar ao banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    
    // Configura o modo de erro para lançar exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se houver um erro na conexão, exibe uma mensagem
    echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
}
?>
