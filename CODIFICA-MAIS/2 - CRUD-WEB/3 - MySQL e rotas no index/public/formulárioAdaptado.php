<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulario.css" />
    <title>Formulário</title>
</head>

<body>
    <div class="corpo">
        <h1><?php echo isset($produto) ? 'Editar Item' : 'Novo Item'; ?></h1>
        <form class="forma" action="/salvar" method="post">
            <?php if (isset($produto)): ?>
                <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
            <?php endif; ?>

            <div class="nome_do_item">
                <p>Nome do item</p>
                <input type="text" id="nome" name="nome" required value="<?php echo isset($produto) ? $produto['nome'] : ''; ?>">
            </div>

            <div class="sku_e_udm">
                <div class="sku">
                    <p>SKU</p>
                    <input type="text" id="sku" name="sku" required value="<?php echo isset($produto) ? $produto['sku'] : ''; ?>">
                </div>
                <div class="udm">
                    <p>Unidade de Medida</p>
                    <input type="text" id="udm" name="udm" required value="<?php echo isset($produto) ? $produto['udm'] : ''; ?>">
                </div>
            </div>

            <div class="valor_e_quantidade">
                <div class="valor">
                    <p>Valor</p>
                    <input type="text" id="valor" name="valor" required value="<?php echo isset($produto) ? $produto['valor'] : ''; ?>">
                </div>
                <div class="quantidade">
                    <p>Quantidade</p>
                    <input type="text" id="quantidade" name="quantidade" required value="<?php echo isset($produto) ? $produto['quantidade'] : ''; ?>">
                </div>
            </div>

            <div class="categoria">
                <label for="categoria_id">Categoria</label>
                <select name="categoria_id" id="categoria_id" required>
                    <option value="1" <?php echo isset($produto) && $produto['categoria_id'] == 1 ? 'selected' : ''; ?>>Eletrônicos</option>
                    <option value="2" <?php echo isset($produto) && $produto['categoria_id'] == 2 ? 'selected' : ''; ?>>Eletrodomésticos</option>
                    <option value="3" <?php echo isset($produto) && $produto['categoria_id'] == 3 ? 'selected' : ''; ?>>Móveis</option>
                    <option value="4" <?php echo isset($produto) && $produto['categoria_id'] == 4 ? 'selected' : ''; ?>>Decoração</option>
                    <option value="5" <?php echo isset($produto) && $produto['categoria_id'] == 5 ? 'selected' : ''; ?>>Vestuário</option>
                    <option value="6" <?php echo isset($produto) && $produto['categoria_id'] == 6 ? 'selected' : ''; ?>>Outros</option>
                </select>
            </div>

            <div class="botao-cadastrar">
                <input class="input-botao-cadastrar" type="submit" value="<?php echo isset($produto) ? 'Salvar alterações' : 'Criar item'; ?>">
            </div>
        </form>
    </div>
</body>

</html>