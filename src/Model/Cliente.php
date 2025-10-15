<?php
namespace App\Model;

class Cliente
{
    public ?int $id;
    public string $nome;
    public string $email;
    public ?string $telefone;
    public ?string $data_cadastro;

    public function __construct(
        ?int $id, string $nome,
        string $email, 
        ?string $telefone = null, 
        ?string $data_cadastro = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->data_cadastro = $data_cadastro;
    }
}
