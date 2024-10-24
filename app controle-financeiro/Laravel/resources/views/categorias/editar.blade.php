<x-layout title="Editar">
    <div class="flex absolute justify-center inset-x-0 top-0 z-50 bg-gray-800 text-white p-4">
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
                @foreach ($categorias as $categoria)
                    <tr>
                        <td><?= $categoria['nome'] ?></td>
                        <td class="tbody__botoes">
                            <form action="/categorias" method="GET">
                                <input type="hidden" name="editarCategoriaId" value="<?= $categoria['id'] ?>" />
                                <input type="hidden" name="categoriaNome" value="<?= $categoria['id'] ?>" />
                                <button type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="/categoria/deletar" method="POST" onsubmit="return confirmacarExclucao('<?= $categoria['id'] ?>');">
                                <input type="hidden" name="categoriaId" value="<?= $categoria['id'] ?>" />
                                <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>

    <div class="flex fixed  justify-center inset-x-0 bottom-0 bg-gray-800 text-white p-4">
        <p>© 2024 Controle Financeiro - Codifica +</p>
    </div>

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
</x-layout>