/*UNINDO TABELAS*/


SELECT * 
FROM tabela_de_vendedores;

SELECT * 
FROM notas_fiscais;

SELECT * 
FROM tabela_de_vendedores A /*estou atribuindo uma alias 'A' para 'tabela_de_vendedores'*/
INNER JOIN notas_fiscais B /*atribuindo alias 'B' em 'notas_fiscais'*/
ON A.MATRICULA = B.MATRICULA; /*comparando conteúdos dos campos */

SELECT A.MATRICULA, A.NOME, COUNT(*)
FROM tabela_de_vendedores A
INNER JOIN notas_fiscais B
ON A.MATRICULA = B.MATRICULA
GROUP BY A.MATRICULA, A.NOME;

SELECT A.MATRICULA, A.NOME, COUNT(*)
FROM tabela_de_vendedores A, notas_fiscais B
WHERE A.MATRICULA = B.MATRICULA
GROUP BY A.MATRICULA, A.NOME;

SELECT YEAR(DATA_VENDA), SUM(QUANTIDADE * PRECO) AS FATURAMENTO
FROM notas_fiscais NF INNER JOIN itens_notas_fiscais INF 
ON NF.NUMERO = INF.NUMERO
GROUP BY YEAR(DATA_VENDA)