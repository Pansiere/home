SELECT a.sku, a.nome, a.descricao, a.preco, a.peso, b.nome_fabricante
FROM produtos a
INNER JOIN fabricantes b ON (b.id = a.fabricante_id)
WHERE b.id = 3;
