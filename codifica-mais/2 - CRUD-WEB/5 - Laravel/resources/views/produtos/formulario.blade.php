<x-layout title="Formulário">
    <div class="container mx-auto p-4">
        <header class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">
                {{ isset($produto_id) ? 'Editar Produto' : 'Cadastrar Novo Produto' }}
            </h1>
            <a href="/produtos" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Voltar</a>
        </header>

        <main class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ isset($produto_id) ? route('produtos.update', $produto_id) : route('produtos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @if(isset($produto_id))
                @method('PUT')
                @endif

                <div class="form-group">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" value="{{ isset($produto_id) ? $produto->nome : old('nome') }}" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="form-group">
                    <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                    <input type="text" id="sku" name="sku" value="{{ isset($produto_id) ? $produto->sku : old('sku') }}" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                </div>

                <div class="form-group">
                    <label for="unidade_medida_id" class="block text-sm font-medium text-gray-700">Unidade de Medida</label>
                    <select name="unidade_medida_id" id="unidade_medida_id" required class="mt-1 block w-full border border-gray-300 rounded-md">
                        <option value="1" {{ isset($produto) && $produto->unidade_medida_id == 1 ? 'selected' : '' }}>Un</option>
                        <option value="2" {{ isset($produto) && $produto->unidade_medida_id == 2 ? 'selected' : '' }}>Kg</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="valor" class="block text-sm font-medium text-gray-700">Valor</label>
                    <input type="text" id="valor" name="valor" value="{{ isset($produto_id) ? $produto->valor : old('valor') }}" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                </div>

                <div class="form-group">
                    <label for="quantidade" class="block text-sm font-medium text-gray-700">Quantidade</label>
                    <input type="text" id="quantidade" name="quantidade" value="{{ isset($produto_id) ? $produto->quantidade : old('quantidade') }}" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                </div>

                <div class="form-group">
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select name="categoria_id" id="categoria_id" required class="mt-1 block w-full border border-gray-300 rounded-md">
                        <option value="1" {{ isset($produto) && $produto->categoria_id == 1 ? 'selected' : '' }}>Eletrônicos</option>
                        <option value="2" {{ isset($produto) && $produto->categoria_id == 2 ? 'selected' : '' }}>Eletrodomésticos</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="imagem" class="block text-sm font-medium text-gray-700">Imagem do Produto</label>
                    <input type="file" id="imagem" name="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border file:border-gray-300">
                </div>

                <div class="form-group">
                    <input type="hidden" id="produto_id" name="produto_id" value="{{ isset($produto_id) ? $produto->id : '' }}">
                    <input class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full" type="submit" name="{{ isset($produto_id) ? 'atualizar' : 'salvar' }}" value="{{ isset($produto_id) ? 'Atualizar Produto' : 'Cadastrar Produto' }}">
                </div>
            </form>
        </main>

        <section class="mt-8 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Importar Produtos via CSV</h2>
            <form action="/uploadCsv" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="form-group">
                    <label for="csvFile" class="block text-sm font-medium text-gray-700">Escolha o arquivo CSV:</label>
                    <input type="file" id="csvFile" name="csvFile" accept=".csv" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border file:border-gray-300">
                </div>
                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full" type="submit">Enviar CSV</button>
            </form>
        </section>
    </div>
</x-layout>