<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/styles/transacao/adicionar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Controle Financeiro</title>
</head>

<body>
    <div class="header">
        <h1>TRANSAÇÃO</h1>
    </div>
    <div class="content">
        <a href="/dashboard">VOLTAR</a>
        <h2>Adicionar transação</h2>
        <div class="content__formulario">
            <form id="transacaoFormulario" action="/transacao/adicionar/salvar" method="post" onsubmit="return validarFormulario()">
                <div class="content__formulario__linha">
                    <div class="content__formulario__grupo">
                        <label for="tipo">Tipo</label>
                        <select id="tipo" name="tipo">
                            <option value="Despesa">Despesa</option>
                            <option value="Receita">Receita</option>
                        </select>
                    </div>
                    <div class="content__formulario__grupo">
                        <label for="categoria">Categoria</label>
                        <select id="categoriaNome" name="categoriaNome">
                            <option value="nenhuma">Nenhuma</option>
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= $categoria->getNome() ?>" <?= isset($_GET['categoria']) && $_GET['categoria'] === $categoria->getNome() ? 'selected' : '' ?>><?= $categoria->getNome() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="content__formulario__grupo">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="descricao" required placeholder="Descrição da transação" value="<?= $_GET['descricaoTransacao'] ?? ''; ?>">
                </div>

                <div class="content__formulario__linha">
                    <div class="content__formulario__grupo">
                        <label for="valor">Valor</label>
                        <input type="number" id="valor" name="valor" required step="0.1" placeholder="Ex: 100.50" min="0">
                    </div>
                    <div class="content__formulario__grupo">
                        <label for="data">Data</label>
                        <input type="date" id="data" required name="data" value="<?= date(format: 'Y-m-d'); ?>">
                    </div>
                </div>

                <div class="content__formulario__grupo">
                    <button class="content__formulario__grupo__add" type="submit">Adicionar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <p>© 2024 Controle Financeiro - Codifica +</p>
    </div>
</body>

<script>
    function validarFormulario() {
        const tipo = document.getElementById('tipo').value;
        const categoriaNome = document.getElementById('categoriaNome').value;
        const valor = document.getElementById('valor').value;

        if (tipo === 'Despesa' && categoriaNome === 'nenhuma') {
            alert('Por favor, selecione uma categoria para uma despesa.');
            return false;
        }

        if (valor < 0) {
            alert('O valor não pode ser negativo.');
            return false;
        }
        return true;
    }
</script>

</html>