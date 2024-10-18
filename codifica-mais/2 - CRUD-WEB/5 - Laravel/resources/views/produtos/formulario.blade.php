<x-layout title="Formulário">
    <div class="container">
        <header class="header">
            <h1>{{ isset($produto_id) ? 'Editar Produto' : 'Cadastrar Novo Produto' }}</h1>
            <a class="btn-voltar" href="/produtos">Voltar</a>
        </header>

        <main class="main-content">
            <form class="form-produto" action="{{ isset($produto_id) ? route('produtos.update', $produto_id) : route('produtos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($produto_id))
                @method('PUT')
                @endif

                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" value="{{ isset($produto_id) ? $produto->nome : old('nome') }}" required>
                </div>

                <div class="form-group">
                    <label for="sku">SKU</label>
                    <input type="text" id="sku" name="sku" value="{{ isset($produto_id) ? $produto->sku : old('sku') }}" required>
                </div>

                <div class="form-group">
                    <label for="unidade_medida_id">Unidade de Medida</label>
                    <select name="unidade_medida_id" id="unidade_medida_id" required>
                        <option value="1" {{ isset($produto) && $produto->unidade_medida_id == 1 ? 'selected' : '' }}>Un</option>
                        <option value="2" {{ isset($produto) && $produto->unidade_medida_id == 2 ? 'selected' : '' }}>Kg</option>
                        <option value="3" {{ isset($produto) && $produto->unidade_medida_id == 3 ? 'selected' : '' }}>g</option>
                        <option value="4" {{ isset($produto) && $produto->unidade_medida_id == 4 ? 'selected' : '' }}>L</option>
                        <option value="5" {{ isset($produto) && $produto->unidade_medida_id == 5 ? 'selected' : '' }}>mm</option>
                        <option value="6" {{ isset($produto) && $produto->unidade_medida_id == 6 ? 'selected' : '' }}>cm</option>
                        <option value="7" {{ isset($produto) && $produto->unidade_medida_id == 7 ? 'selected' : '' }}>m</option>
                        <option value="8" {{ isset($produto) && $produto->unidade_medida_id == 8 ? 'selected' : '' }}>m²</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="text" id="valor" name="valor" value="{{ isset($produto_id) ? $produto->valor : old('valor') }}" required>
                </div>

                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="text" id="quantidade" name="quantidade" value="{{ isset($produto_id) ? $produto->quantidade : old('quantidade') }}" required>
                </div>

                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <select name="categoria_id" id="categoria_id" required>
                        <option value="1" {{ isset($produto) && $produto->categoria_id == 1 ? 'selected' : '' }}>Eletrônicos</option>
                        <option value="2" {{ isset($produto) && $produto->categoria_id == 2 ? 'selected' : '' }}>Eletrodomésticos</option>
                        <option value="3" {{ isset($produto) && $produto->categoria_id == 3 ? 'selected' : '' }}>Móveis</option>
                        <option value="4" {{ isset($produto) && $produto->categoria_id == 4 ? 'selected' : '' }}>Decoração</option>
                        <option value="5" {{ isset($produto) && $produto->categoria_id == 5 ? 'selected' : '' }}>Vestuário</option>
                        <option value="6" {{ isset($produto) && $produto->categoria_id == 6 ? 'selected' : '' }}>Outros</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="imagem">Imagem do Produto</label>
                    <input type="file" id="imagem" name="image">
                </div>

                <div class="form-group">
                    <input type="hidden" id="produto_id" name="produto_id" value="{{ isset($produto_id) ? $produto->id : '' }}">
                    <input class="btn-submit" type="submit" name="{{ isset($produto_id) ? 'atualizar' : 'salvar' }}" value="{{ isset($produto_id) ? 'Atualizar Produto' : 'Cadastrar Produto' }}" />
                </div>
            </form>
        </main>

        <section class="csv-section">
            <h2>Importar Produtos via CSV</h2>
            <form action="/uploadCsv" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="csvFile">Escolha o arquivo CSV:</label>
                    <input type="file" id="csvFile" name="csvFile" accept=".csv" />
                </div>
                <button class="btn-submit" type="submit">Enviar CSV</button>
            </form>
        </section>
    </div>
</x-layout>