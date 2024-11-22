@extends("layouts.main")

@section("content")
    <div class="dashboard flex items-center justify-center h-full">
        <div class="w-full max-w-4xl p-4 bg-white rounded-lg shadow-md">
            <!-- Botão para criar nova categoria -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('categorias.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Adicionar Categoria</a>
            </div>

            <!-- Tabela de Categorias -->
            <table class="w-full border border-gray-300 rounded-lg">
                <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b border-gray-300 text-left">Categoria</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-center" style="width: 150px;">Ações</th>
                </tr>
                </thead>
                <tbody>
                <!-- Categorias Exemplo -->
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b border-gray-300">Eletrônicos</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Excluir</button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b border-gray-300">Eletrodomésticos</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Excluir</button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b border-gray-300">Móveis</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Excluir</button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b border-gray-300">Decoração</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Excluir</button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b border-gray-300">Vestuário</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Excluir</button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b border-gray-300">Outros</td>
                    <td class="py-2 px-4 border-b border-gray-300 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Excluir</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
