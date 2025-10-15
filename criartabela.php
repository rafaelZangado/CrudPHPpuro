<?php

$host = 'localhost';
$dbname = 'digitro';
$user = 'root';
$pass = '12345678';

try {
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL para criar tabela
    $sql = "
        CREATE TABLE IF NOT EXISTS clientes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            cpf VARCHAR(14) NOT NULL,
            criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    // Executa SQL
    $pdo->exec($sql);

    echo "Tabela 'clientes' criada com sucesso!\n";

} catch (PDOException $e) {
    echo "Erro ao criar tabela: " . $e->getMessage() . "\n";
}
