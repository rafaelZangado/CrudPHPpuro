# Sistema de Cadastro de Clientes (PHP Puro + MySQL)

## Descrição

Sistema simples para **gerenciar clientes** (CRUD) desenvolvido em **PHP puro** utilizando **MySQL** como banco de dados.  
Eu posso cadastrar, listar, editar e excluir clientes, com validação de formulário, proteção contra SQL Injection e uso de namespaces no padrão PSR-4.

---

## Tecnologias Utilizadas

- PHP 7.4+ ou 8  
- MySQL 8.0+  
- PDO para acesso ao banco de dados  
- Bootstrap 5 para interface básica  
- Composer para autoload (PSR-4)  

---

## Estrutura do Projeto

├── src/
│ ├── Controller/
│ │ └── ClienteController.php
│ ├── Service/
│ │ └── ClienteService.php
│ ├── Repository/
│ │ └── ClienteRepository.php
│ ├── Model/
│ │ └── Cliente.php
│ └── Core/
│ └── Database.php
├── views/
│ ├── layout.php
│ └── clientes/
│ ├── listar.php
│ ├── criar.php
│ └── editar.php
├── index.php
├── test-db.php
├── composer.json
└── README.md


---

## Funcionalidades

- **Listar Clientes:** Exibe todos os clientes cadastrados.  
- **Criar Cliente:** Formulário para adicionar um novo cliente com validação de campos obrigatórios e email único.  
- **Editar Cliente:** Edita informações do cliente existente.  
- **Excluir Cliente:** Remove cliente do banco de dados com confirmação.  
- **Validação:** Todos os campos obrigatórios são validados e o email deve ser válido.  
- **Segurança:** Uso de **prepared statements** (PDO) para prevenir SQL Injection.  

---

## Configuração do Banco de Dados

1. Crie o banco:

```sql
CREATE DATABASE digitro;
depois
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefone VARCHAR(50),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

$host = 'localhost';
$dbname = 'digitro';
$user = 'root';
$pass = '12345678';
```

POR FAVOR 
não esqueça de rodar os comandos
#composer install
#composer dump-autoload
#php -S localhost:8000





