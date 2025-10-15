<?php
namespace App\Repository;

use App\Model\Cliente;
use PDO;

class ClienteRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM clientes ORDER BY id DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($r) => new Cliente($r['id'], $r['nome'], $r['email'], $r['telefone'], $r['data_cadastro']), $rows);
    }

    public function findById(int $id): ?Cliente
    {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->execute([$id]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        return $r ? new Cliente($r['id'], $r['nome'], $r['email'], $r['telefone'], $r['data_cadastro']) : null;
    }

    public function save(Cliente $cliente): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)");
        return $stmt->execute([$cliente->nome, $cliente->email, $cliente->telefone]);
    }

    public function update(Cliente $cliente): bool
    {
        $stmt = $this->pdo->prepare("UPDATE clientes SET nome=?, email=?, telefone=? WHERE id=?");
        return $stmt->execute([$cliente->nome, $cliente->email, $cliente->telefone, $cliente->id]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM clientes WHERE id=?");
        return $stmt->execute([$id]);
    }
}
