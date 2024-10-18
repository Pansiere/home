<x-layout title="Listagem">
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-6">
            <div>
                <a href="/produtos/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Novo item
                </a>
            </div>

            <div>
                <p class="text-gray-700 mb-2">Buscar item</p>
                <form action="busca.php" method="POST" class="flex">
                    <input type="text" id="busca" name="busca" placeholder="Buscar..."
                        class="border border-gray-300 rounded-l p-2 focus:outline-none focus:ring focus:ring-blue-300">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600">
                        Buscar
                    </button>
                </form>
            </div>
        </div>

        <div class="space-y-4">
            @foreach ($produtos as $produto)
            <div class="flex justify-between items-center bg-white shadow-md rounded-lg p-4">
                <div class="space-y-2">
                    <div class="flex items-center space-x-4">
                        <p class="font-bold">#00000{{$produto['id']}}</p>
                        <div class="py-1 px-3 rounded bg-gray-200">
                            <p class="text-sm">{{$produto['categoria']['categoria']}}</p>
                        </div>
                    </div>
                    <p class="text-lg font-semibold">{{$produto['nome']}}</p>
                    <form action="{{ route('produtos.edit', $produto['id']) }}" method="GET" class="mt-2">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            Editar
                        </button>
                    </form>
                </div>

                <div class="w-24 h-24">
                    <img src="{{$produto['imagem']}}" class="w-full h-full object-cover rounded-lg" />
                </div>

                <div class="space-y-2">
                    <p class="text-sm text-gray-500">SKU: {{$produto['sku']}}</p>
                    <p class="text-sm text-gray-500">Quantidade: {{$produto['quantidade']}}</p>
                    <form action="{{ route('produtos.destroy', $produto['id']) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id" value="{{ $produto['id'] }}">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Deletar
                        </button>
                    </form>


                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>