SELECT *
FROM tabela_de_produtos
WHERE SABOR LIKE '%Maça';

SELECT *
FROM tabela_de_produtos
WHERE SABOR LIKE '%Maça' AND EMBALAGEM = 'PET';

SELECT *
FROM tabela_de_clientes
WHERE NOME LIKE '%Mattos'