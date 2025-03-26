<?php

use App\Livewire\Forms\CategoryForm;
use Illuminate\Support\Facades\Auth;
use function Livewire\Volt\{form, action, computed};

form(CategoryForm::class);

// Login automático apenas em ambiente de desenvolvimento
if (app()->environment('local') && !Auth::check()) {
    Auth::loginUsingId(1);
}

computed(function () {
    return Auth::user() ? Auth::user()->categories()->get() : collect();
}, 'categories');

action(function () {
    $result = $this->form->save();
    if ($result === 'updated') {
        $this->dispatch('category-updated', message: 'Categoria atualizada com sucesso!');
        $this->form->setCategory(null);
    } elseif ($result === 'created') {
        $this->dispatch('category-created', message: 'Categoria criada com sucesso!');
    }
}, 'save');

action(function ($id) {
    $category = Auth::user()->categories()->findOrFail($id);
    $this->form->setCategory($category);
}, 'edit');

action(function () {
    $this->form->setCategory(null);
    $this->form->reset('name');
}, 'cancel');

action(function ($id) {
    $category = Auth::user()->categories()->findOrFail($id);
    
    // Verificar se existem transações nessa categoria
    if ($category->transactions()->count() > 0) {
        $this->dispatch('category-error', message: 'Não é possível excluir categorias com transações associadas.');
        return;
    }
    
    $category->delete();
    $this->cancel();
    $this->dispatch('category-deleted', message: 'Categoria excluída com sucesso!');
}, 'delete');

?>

<div
    class="min-h-screen py-8 flex flex-col items-center justify-start bg-gradient-to-r from-cyan-500 to-blue-500 w-screen sm:w-[calc(100vw-16rem)]">
    <div class="w-full max-w-2xl px-4">
        <div class="hidden sm:block">
            <x-h1>Categorias</x-h1>
            <hr class="my-6">
        </div>
        <x-message />

        <!-- Formulário -->
        <div class="bg-white p-6 rounded-lg shadow-md w-full mb-6">
            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <x-text-input wire:model.live="form.name" id="name" type="name" name="name" required
                        placeholder="Digite o nome da categoria" class="w-full" />
                    <x-input-error field="form.name" />
                </div>
                <div class="flex space-x-4">
                    <x-button type="submit">{{ $form->category ? 'Atualizar' : 'Criar' }}</x-button>
                    @if ($form->category)
                        <x-button type="button" wire:click="cancel">Cancelar</x-button>
                    @endif
                </div>
            </form>
        </div>

        <!-- Listagem de Categorias -->
        <div class="w-full">
            <x-h2>Categorias Cadastradas</x-h2>
            
            @if ($categories->count())
                <div class="space-y-2 w-full mt-4">
                    @foreach($categories as $category)
                        <div class="flex justify-between items-center p-4 bg-white rounded-lg shadow-md">
                            <span class="font-medium text-gray-800">{{ $category->name }}</span>
                            <div class="space-x-2">
                                <button 
                                    wire:click="edit({{ $category->id }})" 
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors"
                                >
                                    Editar
                                </button>
                                <button 
                                    wire:click="delete({{ $category->id }})" 
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition-colors"
                                    onclick="return confirm('Tem certeza que deseja excluir esta categoria?')"
                                >
                                    Excluir
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white p-6 rounded-lg shadow-md w-full mt-4 text-center">
                    <x-p>Nenhuma categoria cadastrada ainda.</x-p>
                </div>
            @endif
        </div>
    </div>
</div>