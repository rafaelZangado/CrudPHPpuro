<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controller\ClienteController;

if (class_exists(ClienteController::class)) {
    echo "Classe ClienteController carregada com sucesso!";
} else {
    echo "Classe ClienteController NÃO encontrada!";
}
