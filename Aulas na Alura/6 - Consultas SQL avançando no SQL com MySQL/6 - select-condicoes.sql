SELECT *
FROM tabela_de_produtos
WHERE SABOR = 'Manga';

SELECT *
FROM tabela_de_produtos
WHERE SABOR = 'Morango';

SELECT *
FROM tabela_de_produtos
WHERE SABOR = 'Morango' OR TAMANHO = '470 ml';

SELECT *
FROM tabela_de_produtos
WHERE SABOR = 'Manga' AND TAMANHO = '470 ml';

SELECT *
FROM tabela_de_produtos
WHERE NOT (SABOR = 'Manga' AND TAMANHO = '470 ml');

SELECT *
FROM tabela_de_produtos
WHERE SABOR = 'Manga' AND NOT (TAMANHO = '470 ml');

SELECT *
FROM tabela_de_produtos
WHERE SABOR IN ('Manga', 'Laranja');/* está ultimo comando é equivalente ao -> SELECT *
FROM tabela_de_produtos
WHERE SABOR = 'Manga' OR SABOR = 'Laranja'; */

SELECT *
FROM tabela_de_clientes
WHERE CIDADE IN ('Rio de Janeiro', 'São Paulo') AND IDADE >= 20;

SELECT *
FROM tabela_de_clientes
WHERE CIDADE IN ('Rio de Janeiro', 'São Paulo') AND (IDADE >= 19 AND IDADE <= 21);

SELECT *
FROM tabela_de_clientes
WHERE CIDADE IN ('Rio de Janeiro', 'São Paulo') AND (IDADE >= 19 AND IDADE <= 22);