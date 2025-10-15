<?php
namespace App\Service;

use App\Repository\ClienteRepository;
use App\Model\Cliente;

class ClienteService
{
    private ClienteRepository $repository;

    public function __construct(ClienteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listar(): array
    {
        return $this->repository->findAll();
    }

    public function buscar(int $id): ?Cliente
    {
        return $this->repository->findById($id);
    }

    public function criar(array $dados): array
    {
        $erros = $this->validar($dados);
        if (!empty($erros)) {
            return ['erros' => $erros];
        }
       
        $cliente = new Cliente(null, $dados['nome'], $dados['email'], $dados['telefone'] ?? null);
        $this->repository->save($cliente);
        return ['sucesso' => true];
    }

    public function atualizar(int $id, array $dados): array
    {
        $erros = $this->validar($dados, $id);
        if (!empty($erros)) {
            return ['erros' => $erros];
        }

        $cliente = new Cliente($id, $dados['nome'], $dados['email'], $dados['telefone'] ?? null);
        $this->repository->update($cliente);
        return ['sucesso' => true];
    }

    public function excluir(int $id): void
    {
        $this->repository->delete($id);
    }

    private function validar(array $dados): array
    {
        $erros = [];

        if (empty($dados['nome'])) {
            $erros[] = "O campo nome é obrigatório.";
        }

        if (empty($dados['email'])) {
            $erros[] = "O campo email é obrigatório.";
        } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $erros[] = "Email inválido.";
        }

        return $erros;
    }
}
