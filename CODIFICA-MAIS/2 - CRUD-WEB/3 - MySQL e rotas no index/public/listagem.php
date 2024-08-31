<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/listagem.css" />
    <title>Listagem de produtos</title>
</head>

<body>

    <div class="corpo">

        <div class="botoes">
            <div class="botoes_novo_item">
                <a href="/criar" class="botoes_action_novo_item" type="submit">Novo item</a>
            </div>

            <div class="botoes_buscar_item">
                <p>Buscar item</p>
                <div class="barra-buscador">
                    <form action="busca.php" method="POST">
                        <input type="text" id="busca" name="busca">
                    </form>
                </div>
            </div>
        </div>

        <p class="msg_estoque_vazio"> <?= 'a' ?> </p>

        <div class="scroll">
            <?php foreach ($produtos->listar() as $key => $value) : ?>
                <div class="produto">
                    <div class="infos_lado_direito">
                        <div class="primeira_linha">
                            <p class="id">#00000<?= $key + 1 ?></p>

                            <div class="categoria<?= $value['categoria_id'] ?>">
                                <?= $_SESSION['categorias'][$value['categoria_id']] ?>
                            </div>
                        </div>

                        <p><?= $value['nome'] ?></p>

                        <form action="#" method="post" class="editar">
                            <input type="hidden" name="editar_header_key" value="<?= $key ?>">
                            <button type="submit">Editar</button>
                        </form>
                    </div>

                    <div class="infos_lado_esquerdo">
                        <p class="sku">SKU: <?= $value['sku'] ?></p>

                        <p>Quantidade: <?= $value['quantidade'] ?></p>

                        <div class="deletar">
                            <form action="#" method="post">
                                <input type="hidden" name="deletar_key" value="<?= $key ?>">

                                <button type="submit">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>