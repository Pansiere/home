<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulario.css" />
    <title>Listagem de produtos</title>
</head>

<body>
    <section class="corpo">

        <h2>Novo item</h2>

        <section class="container-form">
            <form class="ct" action="#" method="post">

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
                        <p>Unidade de medida</p>

                        <input type="text" id="udm" name="udm" required>
                    </div>

                </div>


                <div class="valor_e_quantidade">
                    <div class="valor">
                        <label for="valor">Valor</label>
                        <input type="text" id="valor" name="valor" required>
                    </div>

                    <div class="quantidade">
                        <label for="quantidade">Quantidade</label>
                        <input type="text" id="quantidade" name="quantidade" required>
                    </div>
                </div>


                <div class="categoria">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria" required>
                        <option value="eletronicos">Eletrônicos</option>
                        <option value="eletrodomesticos">Eletrodomésticos</option>
                        <option value="moveis">Móveis</option>
                        <option value="decoaracao">Decoraação</option>
                        <option value="vestuario">Vestuário</option>
                        <option value="outros">Outros</option>
                    </select>
                </div>


                <input type="submit" name="editar" class="botao-cadastrar" value="Criar item" />

            </form>

        </section>

    </section>

</body>

</html>