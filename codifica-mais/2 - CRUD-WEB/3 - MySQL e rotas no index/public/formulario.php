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
            <a class="botoes_voltar" href="/listagem" type="submit"> VOLTAR </a>
        </div>
        <form class="forma" action="<?= $produto_id ? '/atualizar' : '/salvar' ?>" method="post">
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
                        <option value="1">Un</option>
                        <option value="2">Kg</option>
                        <option value="3">g</option>
                        <option value="4">L</option>
                        <option value="5">mm</option>
                        <option value="6">cm</option>
                        <option value="7">m</option>
                        <option value="8">m²</option>
                    </select>
                </div>
            </div>
            <div class="valor_e_quantidade">
                <div class="valor">
                    <p>Valor</p>
                    <input type="text" id="valor" name="valor" value="<?= $produto_id ? $produtos->buscarPorId($produto_id)['valor'] : '' ?>" required>
                </div>
                <div class="quantidade">
                    <p>Quantidade</p>
                    <input type="text" id="quantidade" name="quantidade" value="<?= $produto_id ? $produtos->buscarPorId($produto_id)['quantidade'] : '' ?>" required>
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
                <input type="hidden" id="produto_id" name="produto_id" value="<?= $produto_id ? $produtos->buscarPorId($produto_id)['id'] : '' ?>">
                <input class="input-botao-cadastrar" type="submit" name="<?= $produto_id ? 'atualizar' : 'salvar' ?>" value="<?= $produto_id ? 'Atualizar' : 'Salvar' ?>" />
            </div>
        </form>
    </div>
</body>

</html>