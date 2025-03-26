<?php
use Livewire\Volt\Component;
use App\Livewire\Actions\Logout;

new class extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
}; ?>

<div x-show="!isMobile || sidebarOpen" x-cloak
     @click.away="if (isMobile) sidebarOpen = false"
     x-transition:enter="transition transform duration-300"
     x-transition:enter-start="-translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition transform duration-300"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="-translate-x-full"
     class="fixed z-10 inset-0 bg-gray-800 text-white h-screen flex flex-col 
            lg:static lg:inset-auto lg:w-64 lg:h-screen">

    <!-- Top Section -->
    <div class="flex justify-between items-center px-4 py-4 border-b border-gray-700">
        <x-h2><i class="fa-solid fa-house"></i></x-h2>
        <x-button @click="sidebarOpen = false" class="text-gray-400 hover:text-white focus:outline-none lg:hidden">✖</x-button>
    </div>

    <!-- Perfil -->
    <div class="text-center p-6 border-b border-gray-700">
        <img src="{{-- route('user.profile-picture') --}}" alt="Foto do perfil" class="w-24 h-24 rounded-full mx-auto mb-3 border-4 border-blue-500">
        <p class="font-bold text-lg">{{-- auth()->user()->name --}}</p>
    </div>

    <!-- Menu de Navegação -->
    <nav class="mt-4 flex flex-col flex-1 overflow-y-auto">
        <h2 class="text-gray-400 uppercase text-sm px-6 py-2">Menu</h2>
        <ul class="mt-2 space-y-1">
            <x-menu-item link="{{ route('dashboard') }}" text="Dashboard" icon="fas fa-chart-line" :active="request()->routeIs('dashboard')"
                activeIconColor="text-green-300" defaultIconColor="text-green-500" />
            <x-menu-item link="#" text="Transações" icon="fas fa-exchange-alt" :active="request()->routeIs('admin.user.*')"
                activeIconColor="text-blue-300" defaultIconColor="text-blue-500" />
            <x-menu-item link="{{ route('category.index') }}" text="Categorias" icon="fas fa-tags" :active="request()->routeIs('category.*')"
                activeIconColor="text-green-300" defaultIconColor="text-green-500" />
            <x-menu-item link="{{ route('financial-means.index') }}" text="Meios Financeiros" icon="fa-solid fa-building-columns" :active="request()->routeIs('financial-means.*')"
                activeIconColor="text-indigo-300" defaultIconColor="text-indigo-500" />
            <x-menu-item link="#" text="Relatórios" icon="fas fa-chart-line" :active="request()->routeIs('admin.user.*')"
                activeIconColor="text-purple-300" defaultIconColor="text-purple-500" />
            @if (auth()->user()->isAdmin())
                <x-menu-item link="#" text="Usuários" icon="fas fa-user" :active="request()->routeIs('admin.user.*')"
                    activeIconColor="text-yellow-300" defaultIconColor="text-yellow-500" />
                <x-menu-item link="#" text="Turnstile" icon="fa-brands fa-cloudflare" :active="request()->routeIs('admin.user.*')"
                    activeIconColor="text-yellow-300" defaultIconColor="text-yellow-500" />
            @endif
            <x-menu-item link="#" text="Configurações" icon="fas fa-cog" :active="request()->routeIs('admin.user.*')"
                activeIconColor="text-gray-300" defaultIconColor="text-gray-500" />
        </ul>
    </nav>

    <!-- Botão de Sair (Logout) -->
    <div class="mt-auto px-4 py-6 flex justify-center">
        <button wire:click="logout"
            class="w-full max-w-lg bg-red-500 text-white text-center py-3 px-6 rounded-lg hover:bg-red-600 transition">
            <i class="fas fa-sign-out-alt text-white mr-2"></i>Sair
        </button>
    </div>
</div>