<?php
namespace App\Controller;

use App\Core\Database;
use App\Repository\ClienteRepository;
use App\Service\ClienteService;

class ClienteController
{
    private ClienteService $service;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $repository = new ClienteRepository($pdo);
        $this->service = new ClienteService($repository);
    }

    public function handle(): void
    {
        $action = $_GET['action'] ?? 'listar';

        switch ($action) {
            case 'criar':  $this->criar(); break;
            case 'editar': $this->editar(); break;
            case 'excluir': $this->excluir(); break;
            default: $this->listar();
        }
    }

    private function listar(): void
    {
        $clientes = $this->service->listar();
        include __DIR__ . '/../../views/clientes/listar.php';
    }

    private function criar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado = $this->service->criar($_POST);
            if (!empty($resultado['erros'])) {
                $erros = $resultado['erros'];
            } else {
                header("Location: index.php");
                exit;
            }
        }
        include __DIR__ . '/../../views/clientes/criar.php';
    }

    private function editar(): void
    {
        $id = $_GET['id'] ?? null;
        if (!$id) { header("Location: index.php"); exit; }

        $cliente = $this->service->buscar((int)$id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado = $this->service->atualizar((int)$id, $_POST);
            if (!empty($resultado['erros'])) {
                $erros = $resultado['erros'];
            } else {
                header("Location: index.php");
                exit;
            }
        }

        include __DIR__ . '/../../views/clientes/editar.php';
    }

    private function excluir(): void
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->service->excluir((int)$id);
        }
        header("Location: index.php");
    }
}
