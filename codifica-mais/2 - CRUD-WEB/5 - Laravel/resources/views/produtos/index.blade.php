<x-layout title="Listagem">
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

        <!-- <p class="msg_estoque_vazio"> @{{$produtos->checarEstoque()}} </p> -->

        <div class="scroll">
            @foreach ($produtos as $produto)
            <div class="produto">
                <div class="infos_lado_direito">
                    <div class="primeira_linha">
                        <p class="id">#00000{{$produto['id']}}</p>
                        <div class="categoria{{$produto['categoria_id']}}">
                            <p>{{$produto['categoria']['categoria']}}</p>
                        </div>
                    </div>
                    <p>{{$produto['nome']}}</p>
                    <form action="/editar" method="post" class="editar">
                        <input type="hidden" name="produto_id" value="{{$produto['id']}}">
                        <button type="submit">Editar</button>
                    </form>
                </div>
                <div class="imagem">
                    <img src="{{$produto['imagem']}}" width="100" height="100" />
                </div>
                <div class="infos_lado_esquerdo">
                    <p class="sku">SKU: {{$produto['sku']}}</p>
                    <p>Quantidade: {{$produto['quantidade']}}</p>
                    <div class="deletar">
                        <form action="/deletar" method="post">
                            <input type="hidden" name="produto_id" value="{{$produto['id']}}">
                            <button type="submit">Deletar</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>