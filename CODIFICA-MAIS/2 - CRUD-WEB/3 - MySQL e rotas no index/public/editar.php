<?php

require_once '../vendor/autoload.php';

use Pansiere\Crud\Produtos;

session_start();

$produtos = new Produtos();

if (isset($_SESSION['editar_key'])) {
    $key = $_SESSION['editar_key'];

    if (isset($_POST['nome'])) {
        $produtos->atualizar(
            $key,
            3,
            $_POST['nome'],
            $_POST['sku'],
            $_POST['udm'],
            (float) $_POST['valor'],
            (int) $_POST['quantidade'],
            $_POST['categoria']
        );
        header('Location: listagem.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/editar.css" />
    <title>Editar Item</title>
</head>

<body>

    <div class="corpo">

        <h1 class="id">Editar Item #00000<?= $key + 1 ?></h1>

        <form class="forma" action="#" method="post">
            <input type="hidden" name="key" value="<?= $_POST['key'] ?>">

            <div class="nome_do_item">
                <p>Nome do item</p>

                <input type="text" id="nome" name="nome" value="<?= $produtos->listar()[$key]['nome'] ?>" required>

            </div>

            <div class="sku_e_udm">
                <div class="sku">
                    <p>SKU</p>

                    <input type="text" id="sku" name="sku" value="<?= $_SESSION['produtos'][$key]['sku'] ?>" required>
                </div>

                <div class="udm">
                    <p>Unidade de Medida</p>

                    <input type="text" id="udm" name="udm" value="<?= $_SESSION['unidades_medidas'][$produtos->listar()[$key]['unidade_medida_id']] ?>" required>
                </div>
            </div>

            <div class="valor_e_quantidade">
                <div class="valor">
                    <p>Valor</p>

                    <input type="text" id="valor" name="valor" value="<?= $produtos->listar()[$key]['valor'] ?>" required>
                </div>

                <div class="quantidade">
                    <p>Quantidade Estoque</p>

                    <input type="text" id="quantidade" name="quantidade" value="<?= $produtos->listar()[$key]['quantidade'] ?>" required>
                </div>
            </div>

            <div class="categoria">
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" value="6" required>
                    <option value="1">Eletrônicos</option>
                    <option value="2">Eletrodomésticos</option>
                    <option value="3">Móveis</option>
                    <option value="4">Decoraação</option>
                    <option value="5">Vestuário</option>
                    <option value="6">Outros</option>
                </select>
            </div>

            <div class="botao-editar">
                <input class="input-botao-cadastrar" type="submit" name="editar" value="Editar item" />
            </div>

        </form>


    </div>

</body>

</html>