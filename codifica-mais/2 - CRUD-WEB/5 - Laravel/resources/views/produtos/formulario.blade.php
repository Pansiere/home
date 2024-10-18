<x-layout title="Formulário">
    <div class="container mx-auto p-4">
        <header class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">
                {{ isset($produto) ? 'Editar Produto' : 'Cadastrar Novo Produto' }}
            </h1>
            <a href="/produtos" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Voltar</a>
        </header>

        <main class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ isset($produto) ? route('produtos.update', $produto) : route('produtos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @if(isset($produto))
                @method('PUT')
                @endif

                <div class="form-group">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" value="{{ isset($produto) ? $produto->nome : old('nome') }}" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="form-group">
                    <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                    <input type="text" id="sku" name="sku" value="{{ isset($produto) ? $produto->sku : old('sku') }}" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
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
                    <input type="number" id="valor" name="valor" value="{{ isset($produto) ? $produto->valor : old('valor') }}" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                </div>

                <div class="form-group">
                    <label for="quantidade" class="block text-sm font-medium text-gray-700">Quantidade</label>
                    <input type="number" id="quantidade" name="quantidade" value="{{ isset($produto) ? $produto->quantidade : old('quantidade') }}" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md">
                </div>

                <div class="form-group">
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select name="categoria_id" id="categoria_id" required class="mt-1 block w-full border border-gray-300 rounded-md">
                        <option value="1" {{ isset($produto) && $produto->categoria_id == 1 ? 'selected' : '' }}>Eletrônicos</option>
                        <option value="2" {{ isset($produto) && $produto->categoria_id == 2 ? 'selected' : '' }}>Eletrodomésticos</option>
                        <option value="3" {{ isset($produto) && $produto->categoria_id == 2 ? 'selected' : '' }}>Móveis</option>
                        <option value="4" {{ isset($produto) && $produto->categoria_id == 2 ? 'selected' : '' }}>Decoração</option>
                        <option value="5" {{ isset($produto) && $produto->categoria_id == 2 ? 'selected' : '' }}>Vestuário</option>
                        <option value="6" {{ isset($produto) && $produto->categoria_id == 2 ? 'selected' : '' }}>Outros</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="imagem" class="block text-sm font-medium text-gray-700">Imagem do Produto</label>
                    <input type="file" id="imagem" name="imagem" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border file:border-gray-300">
                </div>

                <div class="form-group">
                    <input type="hidden" id="produto" name="produto" value="{{ isset($produto) ? $produto->id : '' }}">
                    <input class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full" type="submit" name="{{ isset($produto) ? 'atualizar' : 'salvar' }}" value="{{ isset($produto) ? 'Atualizar Produto' : 'Cadastrar Produto' }}">
                </div>
            </form>
        </main>

        <section class="mt-8 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Importar Produtos via CSV</h2>
            <form action="{{ route('uploadCsv') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="fileToUpload">CSV File to upload</label>
                    <input name="csvFile" type="file" class="form-control" id="fileToUpload" placeholder="Select file">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Upload</button>
            </form>

        </section>
    </div>
</x-layout>