-- Uso do banco de dados
USE gestao_produtos;

-- Criação da tabela produtos
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sku VARCHAR(50) UNIQUE NOT NULL,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NULL,
    categoria_id INT NULL,
    fabricante_id INT NULL,
    fornecedor_id INT NULL,
    unidade_medida_id INT NULL,
    preco DECIMAL(10, 2) NULL,
    peso DECIMAL(10, 2) NULL,
    quantidade_estoque INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    FOREIGN KEY (fabricante_id) REFERENCES fabricantes(id),
    FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id),
    FOREIGN KEY (unidade_medida_id) REFERENCES unidades_medida(id)
);
