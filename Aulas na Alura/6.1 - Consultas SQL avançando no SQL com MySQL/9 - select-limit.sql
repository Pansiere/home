SELECT *
FROM tabela_de_produtos;

SELECT *
FROM tabela_de_produtos
LIMIT 5;

SELECT *
FROM tabela_de_produtos
LIMIT 2,3;

SELECT *
FROM notas_fiscais
WHERE DATA_VENDA = '2017-01-01'
limit 10