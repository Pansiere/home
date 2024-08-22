<?php

session_start();

if (isset($_POST['nome'])) {

    $_SESSION['produtos'][] = [
        'id' => 3,
        'nome' => $_POST['nome'],
        'sku' => $_POST['sku'],
        'udm' => $_POST['udm'],
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
    <link rel="stylesheet" href="./css/formulario.css" />
    <title>Formulário</title>
</head>

<body>

    <div class="corpo">

        <h1>Novo Item</h1>

        <form class="forma" action="#" method="post">

            <div class="nome_do_item">
                <p>Nome do item</p>

                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="sku_e_udm">
                <div class="sku">
                    <p>SKU</p>

                    <input type="text" id="sku" name="sku" required>
                </div>

                <div class="udm">
                    <p>Unidade de Medida</p>

                    <input type="text" id="udm" name="udm" required>
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
                <label for="categoria">Categoria</label>
                <select name="categoria" required>
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