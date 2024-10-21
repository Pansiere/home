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

-- Concede permissões ao usuário
GRANT ALL PRIVILEGES ON controle_financeiro.* TO 'controle_financeiro_user'@'%';

-- Aplicar as permissões
FLUSH PRIVILEGES;