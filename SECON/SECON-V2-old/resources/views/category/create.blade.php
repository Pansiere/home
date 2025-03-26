<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        @if (session()->has('message'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-md">
                {{ session('message') }}
            </div>
        @endif

        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Criar Categoria</h2>
        <form wire:submit="save">
            <x-text-input id="name" wire:model.defer="form.name" placeholder="Digite o nome da categoria" />

            @error('form.name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            <div class="flex justify-between gap-2 mt-4">
                <x-link-button href="{{ route('category.index') }}" cancelar="true">Cancelar</x-link-button>
                <x-primary-button type="submit">Criar Categoria</x-primary-button>
            </div>
        </form>

    </div>
</div>
