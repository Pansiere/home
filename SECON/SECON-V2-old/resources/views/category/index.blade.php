<div class="dashboard flex flex-col gap-2 items-center justify-center h-full">
    <div class="w-full max-w-4xl p-4 bg-white rounded-lg shadow-md">
        <div class="max-h-[500px] overflow-y-auto border border-gray-300 rounded-lg">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Categoria</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-center" style="width: 150px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Auth()->user()->categories as $category)
                        <tr class="hover:bg-gray-50">
                            {{-- <td class="py-2 px-4 border-b border-gray-300">{{ Crypt::decryptString($category->name) }} --}}
                            <td class="py-2 px-4 border-b border-gray-300">{{ $category->name }}
                            </td>
                            <td class="py-2 px-4 border-b border-gray-300 text-center">
                                <div class="flex justify-center space-x-2">
                                    <x-link-button href="{{ route('category.edit', $category) }}"
                                        icon="fa-solid fa-eye"></x-link-button>
                                    <form action="route('categories.destroy', $category->id)" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"><i
                                                class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-end gap-1 mb-1">
        <x-link-button href="{{ route('dashboard') }}" cancelar="true">Voltar</x-link-button>
        <x-link-button href="{{ route('category.create') }}" icon="fa-solid fa-plus">Criar</x-link-button>
    </div>
</div>
