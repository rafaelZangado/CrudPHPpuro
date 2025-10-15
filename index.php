<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controller\ClienteController;

$controller = new ClienteController();
$controller->handle();
