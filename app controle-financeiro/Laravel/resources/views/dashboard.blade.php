<x-layout title="Dashboard">
    <div class="flex absolute justify-center inset-x-0 top-0 z-50 bg-gray-800 text-white p-4">
        <h1>DASHBOARD</h1>
    </div>

    <div class="flex-row space-y-4">        
        <h2 class="flex justify-center">Seja bem vindo(a), Nome Aquis!</h2>
        <div>
            <a href="/autenticacao/logout">Logout</a>
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
                <a href="/transacao/create">Nova Entrada</a>
            </div>
        </div>

        <div>
            <form method="GET" action="/dashboard" class="flex">
                <div>
                    <p>Período</p>
                    <select name="periodo">
                        <option value="todos">Todos</option>
                        <option value="01/2024">01/2024</option>
                        <option value="02/2024" selected>02/2024</option>
                        <option value="03/2024">03/2024</option>
                    </select>
                </div>
                <div>
                    <p>Entrada</p>
                    <select name="tipo">
                        <option value="todos" selected>Todos</option>
                        <option value="Receita">Receita</option>
                        <option value="Despesa">Despesa</option>
                    </select>
                </div>
                <div>
                    <p>Categoria</p>
                    <select name="categoriaNome">
                        <option value="todos">Todos</option>
                        <option value="Alimentação">Alimentação</option>
                        <option value="Transporte">Transporte</option>
                    </select>
                </div>
                <button type="submit">Filtrar</button>
            </form>
        </div>
        <div class="flex">
            <div>
                <p>RECEITA</p>
                <p>R$ 5.000,00</p>
            </div>
            <div>
                <p>DESPESAS</p>
                <p>R$ 2.500,00</p>
            </div>
            <div>
                <p>TOTAL</p>
                <p>R$ 2.500,00</p>
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
                <tr>
                    <td >Receita</td>
                    <td>R$ 1.200,00</td>
                    <td>Salário</td>
                    <td>01/02/2024</td>
                    <td>Trabalho</td>
                    <td >
                        <form action="/transacao/editar" method="get">
                            <input type="hidden" name="transacaoId" value="1" />
                            <button type="submit"><i></i></button>
                        </form>
                        <form action="/transacao/deletar" method="POST" onsubmit="return confirmarDeletar('Salário');">
                            <input type="hidden" name="transacaoId" value="1" />
                            <button type="submit"><i></i></button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td >Despesa</td>
                    <td>R$ 300,00</td>
                    <td>Aluguel</td>
                    <td>05/02/2024</td>
                    <td>Moradia</td>
                    <td >
                        <form action="/transacao/editar" method="get">
                            <input type="hidden" name="transacaoId" value="2" />
                            <button type="submit"><i></i></button>
                        </form>
                        <form action="/transacao/deletar" method="POST" onsubmit="return confirmarDeletar('Aluguel');">
                            <input type="hidden" name="transacaoId" value="2" />
                            <button type="submit"><i></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="flex fixed  justify-center inset-x-0 bottom-0 bg-gray-800 text-white p-4">
                <p>© 2024 Controle Financeiro - Codifica +</p>
    </div>
</x-layout>
