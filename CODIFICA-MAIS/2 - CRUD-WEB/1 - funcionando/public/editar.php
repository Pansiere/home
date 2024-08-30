<?php

session_start();

if (isset($_POST['editar'])) {

    $_SESSION['produtos'][$_POST['key']] = [
        'nome' => $_POST['nome'],
        'sku' => $_POST['sku'],
        'unidade_medida_id' => $_POST['udm'],
        'valor' => $_POST['valor'],
        'quantidade' => $_POST['quantidade'],
        'categoria_id' => $_POST['categoria'],
    ];

    header('Location: listagem.php');
    exit();
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

        <h1 class="id">Editar Item #00000<?= $_POST['key'] + 1 ?></h1>

        <form class="forma" action="#" method="post">
            <input type="hidden" name="key" value="<?= $_POST['key'] ?>">

            <div class="nome_do_item">
                <p>Nome do item</p>

                <input type="text" id="nome" name="nome" value="<?= $_SESSION['produtos'][$_POST['key']]['nome'] ?>" required>

            </div>

            <div class="sku_e_udm">
                <div class="sku">
                    <p>SKU</p>

                    <input type="text" id="sku" name="sku" value="<?= $_SESSION['produtos'][$_POST['key']]['sku'] ?>" required>
                </div>

                <div class="udm">
                    <p>Unidade de Medida</p>

                    <input type="text" id="udm" name="udm" value="<?= $_SESSION['unidades_medidas'][$_SESSION['produtos'][$_POST['key']]['unidade_medida_id']] ?>" required>
                </div>
            </div>

            <div class="valor_e_quantidade">
                <div class="valor">
                    <p>Valor</p>

                    <input type="text" id="valor" name="valor" value="<?= $_SESSION['produtos'][$_POST['key']]['valor'] ?>" required>
                </div>

                <div class="quantidade">
                    <p>Quantidade Estoque</p>

                    <input type="text" id="quantidade" name="quantidade" value="<?= $_SESSION['produtos'][$_POST['key']]['quantidade'] ?>" required>
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