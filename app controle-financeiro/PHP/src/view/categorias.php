<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/styles/categorias.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Controle Financeiro</title>
</head>

<body>
    <div class="header">
        <h1>CATEGORIAS</h1>
    </div>

    <div class="content">
        <div class="content__botoes">
            <a href="/dashboard">VOLTAR</a>
            <form action="<?= $_GET['editarCategoriaId'] ?? false ? '/categoria/editar' : '/categoria/salvar' ?>" method="POST" onsubmit="return confirmacarAtualizacao('<?= $_GET['categoriaNome'] ?? '' ?>');">
                <input type="text" name="categoriaNome" value="<?= $_GET['categoriaNome'] ?? ''; ?>" placeholder="Categoria nova" required />
                <input type="hidden" name="editarCategoriaId" value="<?= $_GET['editarCategoriaId'] ?? '' ?>" />
                <button type="submit"><?= $_GET['editarCategoriaId'] ?? false ? 'Atualizar' : 'Adicionar' ?></button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?= $categoria->getNome() ?></td>
                        <td class="tbody__botoes">
                            <form action="/categorias" method="GET">
                                <input type="hidden" name="editarCategoriaId" value="<?= $categoria->getId() ?>" />
                                <input type="hidden" name="categoriaNome" value="<?= $categoria->getNome() ?>" />
                                <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="/categoria/deletar" method="POST" onsubmit="return confirmacarExclucao('<?= $categoria->getNome() ?>');">
                                <input type="hidden" name="categoriaId" value="<?= $categoria->getId() ?>" />
                                <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>

    <div class="footer">
        <p>© 2024 Controle Financeiro - Codifica +</p>
    </div>
</body>

<script>
    function confirmacarExclucao(descricao) {
        return confirm('Tem certeza que deseja excluir a categoria: "' + descricao + '"?');
    }

    function confirmacarAtualizacao(descricao) {
        if (!descricao == '') {
            return confirm('Tem certeza que deseja atualizar a categoria: "' + descricao + '"?');
        }
    }
</script>

</html>