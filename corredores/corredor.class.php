<?php
class Corredor {
    // Propriedades da classe Corredor
    public $id; // Identificador único do corredor (opcional se você usar o banco de dados)
    public $nome; // Nome do corredor
    public $email; // Email do corredor
    public $idade; // Idade do corredor
    public $tempo; // Tempo de corrida do corredor
    public $senha; // Senha do corredor

    // Construtor da classe, que inicializa as propriedades
    public function __construct($nome, $email, $idade, $tempo, $senha) {
        $this->nome = $nome; // Define o nome
        $this->email = $email; // Define o email
        $this->idade = $idade; // Define a idade
        $this->tempo = $tempo; // Define o tempo
        $this->senha = $senha; // Define a senha
    }

    // Método para salvar o corredor no banco de dados
    public function salvar($pdo) {
        // Comando SQL para inserir um novo corredor
        $sql = "INSERT INTO corredores (nome, email, idade, tempo, senha) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql); // Prepara a consulta
        // Executa a consulta com os dados do corredor
        $stmt->execute([$this->nome, $this->email, $this->idade, $this->tempo, $this->senha]);
    }

    // Método estático para buscar todos os corredores do banco de dados
    public static function todos($pdo) {
        $stmt = $pdo->query("SELECT * FROM corredores"); // Comando SQL para selecionar todos os corredores
        // Retorna todos os corredores como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
