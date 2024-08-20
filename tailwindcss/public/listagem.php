<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" />
    <title>Listagem de produtos</title>
</head>

<body>

    <section class="corpo">

        <div class="botoes">
            <div class="botoes_novo_item">
                <form action="formulario.php" method="get" class="botoes_action_novo_item">
                    <button type="submit">Novo item</button>
                </form>
            </div>

            <div class="botoes_buscar_item">
                <p>Buscar item</p>
                <div class="barra-buscador">
                    <form action="busca.php" method="POST">
                        <input type="text" name="busca">
                    </form>
                </div>
            </div>
        </div>

        <?php foreach ($_SESSION['produtos'] as $key => $value) : ?>
            <div class="produto">

                <div class="infos_lado_direito">
                    <div class="primeira_linha">
                        <p class="id">#<?= $value['id'] ?></p>
                        <p class="<?= $_SESSION['categorias'][$value['id']] ?>"><?= $_SESSION['categorias'][$value['id']] ?></p>
                    </div>
                    <p><?= $value['nome'] ?></p>

                    <form action="editar.php" method="get" class="editar">
                        <button type="submit">Editar</button>
                    </form>
                </div>

                <div class="infos_lado_esquerdo">
                    <p class="sku">SKU: <?= $value['sku'] ?></p>
                    <p>Quantidade: <?= $value['quantidade'] ?></p>
                    <div class="deletar">
                        <form action="deletar.php" method="post">
                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                            <button type="submit">Deletar</button>
                        </form>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </section>
</body>


<!-- 
                <div class="produto_linha_1">
                    <div class="produto_linha_1_categoria">

                        <div class="produto_linha_1_categoria_categoria_e_id">
                            <p class="id">#<?= $value['id'] ?></p>
                            <p class="<?= $_SESSION['categorias'][$value['id']] ?>"><?= $_SESSION['categorias'][$value['id']] ?></p>
                        </div>
                        <p class="sku">SKU: <?= $value['sku'] ?></p>
                    </div>


                    <div class="produto_linha_2">
                        <p class="produto_linha_2_espacamento"><?= $value['nome'] ?></p>
                        <p>Quantidade: <?= $value['quantidade'] ?></p>
                    </div>
                    <div class="produto_linha_3">
                        <form action="editar.php" method="get" class="editar">
                            <button type="submit">Editar</button>
                        </form>
                        <P class="deletar">Deletar</P>
                    </div>
                </div> -->

</html>