<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulario.css" />
    <title>Formulário de Produto</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1><?= $produto_id ? 'Editar Produto' : 'Cadastrar Novo Produto' ?></h1>
            <a class="btn-voltar" href="/listagem">Voltar</a>
        </header>

        <main class="main-content">
            <form class="form-produto" action="<?= $produto_id ? '/atualizar' : '/salvar' ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" value="<?= $produto_id ? $produtos->buscarPorId($produto_id)['nome'] : '' ?>" required>
                </div>

                <div class="form-group">
                    <label for="sku">SKU</label>
                    <input type="text" id="sku" name="sku" value="<?= $produto_id ? $produtos->buscarPorId($produto_id)['sku'] : '' ?>" required>
                </div>

                <div class="form-group">
                    <label for="unidade_medida_id">Unidade de Medida</label>
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

                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="text" id="valor" name="valor" value="<?= $produto_id ? $produtos->buscarPorId($produto_id)['valor'] : '' ?>" required>
                </div>

                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="text" id="quantidade" name="quantidade" value="<?= $produto_id ? $produtos->buscarPorId($produto_id)['quantidade'] : '' ?>" required>
                </div>

                <div class="form-group">
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

                <div class="form-group">
                    <label for="imagem">Imagem do Produto</label>
                    <input type="file" id="imagem" name="image">
                </div>

                <div class="form-group">
                    <input type="hidden" id="produto_id" name="produto_id" value="<?= $produto_id ? $produtos->buscarPorId($produto_id)['id'] : '' ?>">
                    <input class="btn-submit" type="submit" name="<?= $produto_id ? 'atualizar' : 'salvar' ?>" value="<?= $produto_id ? 'Atualizar Produto' : 'Cadastrar Produto' ?>" />
                </div>
            </form>
        </main>

        <section class="csv-section">
            <h2>Importar Produtos via CSV</h2>
            <form action="/uploadCsv" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="csvFile">Escolha o arquivo CSV:</label>
                    <input type="file" id="csvFile" name="csvFile" accept=".csv" />
                </div>
                <button class="btn-submit" type="submit">Enviar CSV</button>
            </form>
        </section>
    </div>
</body>

</html>