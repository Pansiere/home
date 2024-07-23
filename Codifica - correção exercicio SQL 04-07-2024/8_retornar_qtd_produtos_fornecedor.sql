SELECT count(*), b.nome_fornecedor
FROM produtos a
INNER JOIN fornecedores b ON (b.id = a.fornecedor_id)
WHERE b.id = 2;
