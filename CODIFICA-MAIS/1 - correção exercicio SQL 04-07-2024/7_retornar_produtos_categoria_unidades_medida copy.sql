SELECT a.sku, a.nome, a.descricao, a.preco, a.peso, b.nome_categoria, c.nome_unidade_medida
FROM produtos a
INNER JOIN categorias b ON (b.id = a.categoria_id)
INNER JOIN unidades_medida c ON (c.id = a.unidade_medida_id)
WHERE b.id = 1 AND c.id = 1;
