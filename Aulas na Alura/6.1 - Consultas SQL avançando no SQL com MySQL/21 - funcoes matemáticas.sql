SELECT (23+((25-2)/2)*45) AS RESULTADO;

SELECT CEILING(12.33333232323) AS RESULTADO;

SELECT ROUND(12.7777232323) AS RESULTADO;

SELECT FLOOR(12.7777232323) AS RESULTADO;

SELECT RAND() AS RESULTADO; 

USE sucos_vendas;

SELECT NUMERO, QUANTIDADE, PRECO, QUANTIDADE * PRECO AS FATURAMENTO
FROM itens_notas_fiscais;

SELECT NUMERO, QUANTIDADE, PRECO, ROUND(QUANTIDADE * PRECO, 2) AS FATURAMENTO
FROM itens_notas_fiscais;

SELECT YEAR(DATA_VENDA), FLOOR(SUM(IMPOSTO * (QUANTIDADE * PRECO))) 
FROM notas_fiscais NF
INNER JOIN itens_notas_fiscais INF ON NF.NUMERO = INF.NUMERO
WHERE YEAR(DATA_VENDA) = 2016
GROUP BY YEAR(DATA_VENDA)