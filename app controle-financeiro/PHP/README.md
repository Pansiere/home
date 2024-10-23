<!-- Desafio proposto pela IDCAP, feito por João Pedro Vicente Pansiere -->

# Sistema de Controle de Despesas Pessoais com PHP e MySQL

## Objetivo

O sistema permite que você:

- Registre receitas e despesas
- Categorize suas transações
- Veja um resumo financeiro das suas atividades

## Requisitos

- **Servidor MySQL**
- **PHP 8.1+**

**Extensões PHP necessárias:**

- `mysqli`
- `pdo_mysql`

## Instruções de Uso

### 1. Configurando o DB

Execute os seguintes comandos em seu servidor MySQL para criar o banco de dados, as tabelas e o usuário de conexão:

```SQL
-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS controle_financeiro;

-- Criação da tabela usuarios
CREATE TABLE IF NOT EXISTS controle_financeiro.usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Criação da tabela categorias
CREATE TABLE IF NOT EXISTS controle_financeiro.categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Criação da tabela transacoes
CREATE TABLE IF NOT EXISTS controle_financeiro.transacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    tipo ENUM('Despesa', 'Receita') NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    categoria_id INT,
    data DATE NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Criação do usuario
CREATE USER IF NOT EXISTS 'controle_financeiro_user'@'%' IDENTIFIED BY 'CODIFICAMAIS';

-- Conceder permissões ao usuário
GRANT ALL PRIVILEGES ON controle_financeiro.* TO 'controle_financeiro_user'@'%';

-- Aplicar as permissões
FLUSH PRIVILEGES;
```

### 2. Clonando e executando

1. **Clone o repositório:** No terminal, execute o comando abaixo para clonar o repositório do projeto para um diretório de sua escolha:

   ```bash
   git clone https://github.com/Pansiere/controle-financeiro-desafio.git
   ```

2. **Acesse o diretório do projeto:** Navegue até a pasta do repositório recém-clonado:

   ```bash
   cd controle-financeiro-desafio
   ```

3. **Inicie o servidor local:** Dentro do diretório `public`, execute o servidor embutido do PHP:

   ```bash
   cd public
   php -S localhost:8080
   ```

4. **Acesse a aplicação:** Abra seu navegador e acesse o endereço:

   `http://localhost:8080`
