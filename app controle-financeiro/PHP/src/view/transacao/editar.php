<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/transacao/editar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Controle Financeiro - Editar Transação</title>
</head>

<body>
    <header class="header">
        <h1>Editar Transação</h1>
    </header>

    <main class="content">
        <a href="/dashboard" class="voltar">← Voltar</a>

        <form id="transacaoFormulario" action="/transacao/editar/atualizar" method="POST" onsubmit="return validarFormulario('<?= $transacao->getDescricao() ?>')">
            <input type="hidden" id="transacaoId" name="transacaoId" value="<?= $transacao->getId() ?>">

            <div class="form-group">
                <label for="tipo">Tipo de Transação</label>
                <p id="tipo"><?= $transacao->getTipo() ?></p>
            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select id="categoriaId" name="categoriaId">
                    <option value="0">Nenhuma</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria->getId() ?>" <?= $transacao->getCategoria() === $categoria->getNome() ? 'selected' : '' ?>>
                            <?= $categoria->getNome() ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <p><?= $transacao->getDescricao() ?></p>
            </div>

            <div class="form-group">
                <label>Valor</label>
                <p>R$ <?= $transacao->getValorFormatado() ?></p>
            </div>

            <div class="form-group">
                <label>Data</label>
                <p><?= $transacao->getDataFormatada() ?></p>
            </div>

            <div class="form-group">
                <button type="submit">Atualizar</button>
            </div>
        </form>
    </main>

    <footer class="footer">
        <p>© 2024 Controle Financeiro - Codifica +</p>
    </footer>

    <script>
        function validarFormulario(descricao) {
            const tipo = document.getElementById('tipo').textContent;
            const categoriaId = document.getElementById('categoriaId').value;

            if (tipo === 'Despesa' && categoriaId === "0") {
                alert('Por favor, selecione uma categoria para uma despesa.');
                return false;
            }
            return confirm('Tem certeza que deseja atualizar a transação: "' + descricao + '" ?');
        }
    </script>
</body>

</html>