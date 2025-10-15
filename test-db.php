<?php
require __DIR__ . '/vendor/autoload.php';

use App\Core\Database;

try {
    $pdo = Database::getConnection();
    echo "✅ Conexão bem-sucedida com o banco de dados!";
} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage();
}
