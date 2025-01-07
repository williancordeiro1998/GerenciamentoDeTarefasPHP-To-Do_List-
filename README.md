# Gerenciamento de Tarefas

Este é um sistema simples de gerenciamento de tarefas, com funcionalidades de login, criação e exclusão de tarefas. A aplicação foi desenvolvida em PHP com um banco de dados MySQL para armazenar informações sobre usuários e suas respectivas tarefas.

## Funcionalidades

- **Login**: Realize login utilizando o nome de usuário e senha.
- **Cadastro**: Crie uma conta de usuário com um nome de usuário e senha.
- **Gerenciamento de Tarefas**: Após login, o usuário pode adicionar e excluir tarefas.
- **Sessão de Usuário**: Após o login, o usuário pode visualizar suas tarefas cadastradas.

## Pré-requisitos

- PHP 7.4 ou superior.
- MySQL ou MariaDB.
- Composer (para autoload de dependências).

## Instruções para Uso

### 1. Configuração do Banco de Dados

Certifique-se de ter um banco de dados MySQL configurado corretamente. Use o seguinte script SQL para criar o banco de dados e as tabelas:

```sql
CREATE DATABASE gerenciamento_de_tarefas;

USE gerenciamento_de_tarefas;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX(username)
);

CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    completed BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX(user_id)
);

##2. Configuração do Arquivo de Conexão

Certifique-se de que o arquivo de configuração de conexão com o banco de dados está correto. Ele está localizado no arquivo Src/Config/Database.php. Altere as credenciais conforme necessário.

<?php

namespace Src\Config;

use PDO;

class Database
{
    private $host = 'localhost'; // Endereço do servidor de banco de dados
    private $dbname = 'gerenciamento_de_tarefas'; // Nome do banco de dados
    private $username = 'root'; // Nome de usuário do banco
    private $password = ''; // Senha do banco de dados

    public function connect()
    {
        try {
            $pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }
}

##3 Acesso ao Sistema

O sistema já vem com um usuário pré-configurado para facilitar o login:
Usuário: microleste
Senha: microleste
Você pode usar essas credenciais para fazer login após rodar a aplicação pela primeira vez.

##4. Execução do Sistema

Clone o repositório para sua máquina local.
Instale as dependências do Composer (se houver) rodando o seguinte comando no terminal dentro do diretório do projeto:
composer install
Inicie o servidor PHP para rodar a aplicação:
php -S localhost:8000 -t public
Abra o navegador e acesse a aplicação em http://localhost:8000.
