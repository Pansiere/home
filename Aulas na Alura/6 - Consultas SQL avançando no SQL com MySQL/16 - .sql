
SELECT *
FROM tabela_de_vendedores;

SELECT count(*)
FROM tabela_de_clientes;

SELECT *
FROM tabela_de_vendedores
INNER JOIN tabela_de_clientes
ON tabela_de_vendedores.BAIRRO = tabela_de_clientes.BAIRRO;

SELECT tabela_de_vendedores.BAIRRO, tabela_de_vendedores.NOME, DE_FERIAS, tabela_de_clientes.BAIRRO, tabela_de_clientes.NOME
FROM tabela_de_vendedores
INNER JOIN tabela_de_clientes
ON tabela_de_vendedores.BAIRRO = tabela_de_clientes.BAIRRO;

SELECT tabela_de_vendedores.BAIRRO, tabela_de_clientes.BAIRRO, tabela_de_vendedores.NOME, DE_FERIAS, tabela_de_clientes.NOME
FROM tabela_de_vendedores
LEFT JOIN tabela_de_clientes
ON tabela_de_vendedores.BAIRRO = tabela_de_clientes.BAIRRO;

SELECT tabela_de_vendedores.BAIRRO, tabela_de_vendedores.NOME, DE_FERIAS, tabela_de_clientes.BAIRRO, tabela_de_clientes.NOME
FROM tabela_de_vendedores
RIGHT JOIN tabela_de_clientes
ON tabela_de_vendedores.BAIRRO = tabela_de_clientes.BAIRRO;

/* NOT WORKING

SELECT tabela_de_vendedores.BAIRRO, tabela_de_vendedores.NOME, DE_FERIAS, tabela_de_clientes.BAIRRO, tabela_de_clientes.NOME
FROM tabela_de_vendedores 
FULL JOIN tabela_de_clientes
ON tabela_de_vendedores.BAIRRO = tabela_de_clientes.BAIRRO;

    Simulação de FULL JOIN usando UNION para MySQL
*/
SELECT v.BAIRRO AS vendedor_bairro, v.NOME AS vendedor_nome, v.DE_FERIAS, c.BAIRRO AS cliente_bairro, c.NOME AS cliente_nome
FROM tabela_de_vendedores v
LEFT JOIN tabela_de_clientes c ON v.BAIRRO = c.BAIRRO

UNION

SELECT v.BAIRRO AS vendedor_bairro, v.NOME AS vendedor_nome, v.DE_FERIAS, c.BAIRRO AS cliente_bairro, c.NOME AS cliente_nome
FROM tabela_de_vendedores v
RIGHT JOIN tabela_de_clientes c ON v.BAIRRO = c.BAIRRO;

/*FULL JOIN*/
SELECT tabela_de_vendedores.BAIRRO,tabela_de_vendedores.NOME, DE_FERIAS,tabela_de_clientes.BAIRRO,tabela_de_clientes.NOME
FROM tabela_de_vendedores , tabela_de_clientes;