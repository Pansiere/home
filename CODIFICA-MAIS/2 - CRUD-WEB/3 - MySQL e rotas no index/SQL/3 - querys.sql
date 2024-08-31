listarTodos:
    $sql = "SELECT produtos.*, unidades_medidas.unidade_medida, categorias.categoria
    FROM produtos
    INNER JOIN unidades_medidas ON produtos.unidade_medida_id = unidades_medidas.id
    INNER JOIN categorias ON produtos.categoria_id = categorias.id
    ORDER BY valor;";
