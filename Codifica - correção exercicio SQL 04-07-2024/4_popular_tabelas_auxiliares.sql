-- Uso do banco de dados
USE gestao_produtos;

-- Inserção de dados na tabela categorias
INSERT INTO categorias (nome_categoria)
VALUES ('Informática'), ('Telefonia'), ('Eletrônicos'), ('Eletrodomésticos'), ('Livros');

-- Inserção de dados na tabela unidades de medida
INSERT INTO unidades_medida (nome_unidade_medida)
VALUES ('Unidade'), ('Kg'), ('g'), ('ml'), ('l');

-- Inserção de dados na tabela fabricantes
INSERT INTO fabricantes (nome_fabricante)
VALUES ('Dell'), ('Samsung'), ('LG Electronics'), ('Nespresso'), ('Sun Tzu'), ('Outros');

-- Inserção de dados na tabela fornecedores
INSERT INTO fornecedores (nome_fornecedor)
VALUES ('Dell Brasil'), ('Samsung Brasil'), ('LG Brasil'), ('Nestlé Brasil'), ('Editora ABC'), ('Outros');
