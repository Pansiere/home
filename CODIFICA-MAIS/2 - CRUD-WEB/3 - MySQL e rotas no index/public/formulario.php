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
        <div class="cima">
            <h1><?= $produto_id ? 'Editar Item' : 'Novo Item' ?></h1>
            <a href="/listagem"> VOLTAR </a>
        </div>
        <form class="forma" action="/salvar" method="post">
            <div class="nome_do_item">
                <p>Nome do item</p>
                <input type="text" id="nome" name="nome" value="<?= $produto_id ? $produtos->buscarPorId($produto_id)['nome'] : '' ?>" required>
            </div>
            <div class="sku_e_udm">
                <div class="sku">
                    <p>SKU</p>
                    <input type="text" id="sku" name="sku" value="<?= $produto_id ? $produtos->buscarPorId($produto_id)['sku'] : '' ?>" required>
                </div>
                <div class="unidade_medida_id">
                    <label for="unidade_medida_id">Unidade de medida</label>
                    <select name="unidade_medida_id" id="unidade_medida_id" required>
                        <option value="1">Eletrônicos</option>
                        <option value="2">Eletrodomésticos</option>
                        <option value="3">Móveis</option>
                        <option value="4">Decoração</option>
                        <option value="5">Vestuário</option>
                        <option value="6">Outros</option>
                    </select>
                </div>
            </div>
            <div class="valor_e_quantidade">
                <div class="valor">
                    <p>Valor</p>
                    <input type="text" id="valor" name="valor" required>
                </div>
                <div class="quantidade">
                    <p>Quantidade</p>
                    <input type="text" id="quantidade" name="quantidade" required>
                </div>
            </div>
            <div class="categoria">
                <label for="categoria_id">Categoria</label>
                <select name="categoria_id" id="categoria_id" required>
                    <option value="1">Eletrônicos</option>
                    <option value="2">Eletrodomésticos</option>
                    <option value="3">Móveis</option>
                    <option value="4">Decoração</option>
                    <option value="5">Vestuário</option>
                    <option value="6">Outros</option>
                </select>
            </div>
            <div class="botao-cadastrar">
                <input class="input-botao-cadastrar" type="submit" name="editar" value="Criar item" />
            </div>
        </form>
    </div>
</body>

</html>

<?php
var_dump($_POST);
