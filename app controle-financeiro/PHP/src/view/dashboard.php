<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/styles/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Controle Financeiro</title>
</head>

<body>
    <div class="header">
        <h1>DASHBOARD</h1>
    </div>
    <div class="content">
        <h2>Seja bem vindo(a) <?= $_SESSION['nome'] ?></h2>
        <div>
            <a class="logout_a" href="/autenticacao/logout">Logout</a>
        </div>
        <div class="content__buscador-e-botoes">
            <div>
                <p>Buscar</p>
                <form action="/dashboard" method="GET">
                    <input type="text" name="descricao" placeholder="Buscador por descrição" />
                </form>
            </div>
            <div>
                <a href="/categorias">Categorias</a>
                <a href="/transacao/adicionar">Nova Entrada</a>
            </div>
        </div>

        <div class="content__filtros">
            <form class="filtros__filtros" method="GET" action="/dashboard">
                <div class="filtros__filtros__periodo">
                    <p>Período</p>
                    <select name="periodo">
                        <option value="todos">Todos</option>
                        <?php foreach ($periodos as $periodo): ?>
                            <option value="<?= $periodo ?>" <?= (isset($_GET['periodo']) && $_GET['periodo'] === $periodo) || (!isset($_GET['periodo']) && $periodo === date('m/Y')) ? 'selected' : '' ?>>
                                <?= $periodo ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filtros__filtros__entrada">
                    <p>Entrada</p>
                    <select name="tipo">
                        <option value="todos" <?= isset($_GET['tipo']) && $_GET['tipo'] === 'Todos' ? 'selected' : '' ?>>Todos</option>
                        <option value="Receita" <?= isset($_GET['tipo']) && $_GET['tipo'] === 'Receita' ? 'selected' : '' ?>>Receita</option>
                        <option value="Despesa" <?= isset($_GET['tipo']) && $_GET['tipo'] === 'Despesa' ? 'selected' : '' ?>>Despesa</option>
                    </select>
                </div>
                <div class="filtros__filtros__categoria">
                    <p>Categoria</p>
                    <select name="categoriaNome">
                        <option value="todos">Todos</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= $categoria->getNome() ?>" <?= isset($_GET['categoriaNome']) && $_GET['categoriaNome'] === $categoria->getNome() ? 'selected' : '' ?>><?= $categoria->getNome() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit">Filtrar</button>
            </form>
        </div>
        <div class="content__resumo">
            <div class="content__resumo__receita">
                <p>RECEITA</p>
                <p class="content__resumo__receita__valor"><?= $transacoesValoresResumo['totalReceita'] ?></p>
            </div>
            <div class="content__resumo__despesas">
                <p>DESPESAS</p>
                <p class="content__resumo__despesas__valor"><?= $transacoesValoresResumo['totalDespesa'] ?></p>
            </div>
            <div class="content__resumo__total">
                <p>TOTAL</p>
                <p class="content__resumo__total__<?= $transacoesValoresResumo['tipoDeSaldo'] ?>"><?= $transacoesValoresResumo['saldo'] ?></p>
            </div>
        </div>
        <h2>Entradas</h2>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Valor (R$)</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transacoes as $transacao): ?>
                    <tr>
                        <td class="<?= $transacao->getTipo() ?>"><?= $transacao->getTipo() ?></td>
                        <td><?= $transacao->getValorFormatado() ?></td>
                        <td><?= $transacao->getDescricao() ?></td>
                        <td><?= $transacao->getDataFormatada() ?></td>
                        <td><?= $transacao->getCategoria() ?: '' ?></td>
                        <td class="tbody__botoes">
                            <form action="/transacao/editar" method="get">
                                <input type="hidden" name="transacaoId" value="<?= $transacao->getId() ?>" />
                                <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="/transacao/deletar" method="POST" onsubmit="return confirmarDeletar('<?= $transacao->getDescricao() ?>');">
                                <input type="hidden" name="transacaoId" value="<?= $transacao->getId() ?>" />
                                <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>© 2024 Controle Financeiro - Codifica +</p>
    </div>
</body>

<script>
    function confirmarDeletar(descricao) {
        return confirm('Tem certeza que deseja excluir a transação: "' + descricao + '"?');
    }
</script>

</html>