<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div id="sidebar"
    class="fixed inset-0 bg-gray-800 text-white transform -translate-x-full transition-transform duration-300 lg:translate-x-0 lg:inset-y-0 lg:w-64 flex flex-col h-screen">
    <!-- Top Section -->
    <div class="flex justify-between items-center px-4 py-4 border-b border-gray-700">
        <h2 class="text-xl font-semibold"><i class="fa-solid fa-house"></i></h2>
        <button id="closeSidebar" class="text-gray-400 hover:text-white focus:outline-none lg:hidden">
            ✖
        </button>
    </div>

    <!-- Perfil -->
    <div class="text-center p-6 border-b border-gray-700">
        <img src="{{-- route('user.profile-picture') --}}" alt="Foto do perfil"
            class="w-24 h-24 rounded-full mx-auto mb-3 border-4 border-blue-500">
        <p class="font-bold text-lg">{{-- auth()->user()->name --}}</p>
    </div>

    <!-- Menu de Navegação -->
    <nav class="mt-4 flex flex-col flex-1 overflow-y-auto">
        <h2 class="text-gray-400 uppercase text-sm px-6 py-2">Menu</h2>
        <ul class="mt-2 space-y-1">
            <!-- Dashboard -->
            <x-menu-item link="{{ route('dashboard') }}" text="Dashboard" icon="fas fa-chart-line" :active="request()->routeIs('dashboard')"
                activeIconColor="text-green-300" defaultIconColor="text-green-500" />

            <!-- Transações -->
            <x-menu-item link="#" text="Transações" icon="fas fa-exchange-alt" :active="request()->routeIs('admin.user.*')"
                activeIconColor="text-blue-300" defaultIconColor="text-blue-500" />

            <!-- Categorias -->
            <x-menu-item link="{{ route('category.index') }}" text="Categorias" icon="fas fa-tags" :active="request()->routeIs('category.*')"
                activeIconColor="text-green-300" defaultIconColor="text-green-500" />

            <!-- Meios Financeiros -->
            <x-menu-item link="#" text="Meios Financeiros" icon="fa-solid fa-building-columns" :active="request()->routeIs('admin.user.*')"
                activeIconColor="text-indigo-300" defaultIconColor="text-indigo-500" />

            <!-- Relatórios -->
            <x-menu-item link="#" text="Relatórios" icon="fas fa-chart-line" :active="request()->routeIs('admin.user.*')"
                activeIconColor="text-purple-300" defaultIconColor="text-purple-500" />

            <!-- Condicional para Admin -->
            {{-- @if (auth()->user()->checkAdmin()) --}}
            <!-- Usuários -->
            <x-menu-item link="#" text="Usuários" icon="fas fa-user" :active="request()->routeIs('admin.user.*')"
                activeIconColor="text-yellow-300" defaultIconColor="text-yellow-500" />

            <!-- Turnstile -->
            <x-menu-item link="#" text="Turnstile" icon="fa-brands fa-cloudflare" :active="request()->routeIs('admin.user.*')"
                activeIconColor="text-yellow-300" defaultIconColor="text-yellow-500" />
            {{-- @endif --}}

            <!-- Configurações -->
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

@push('scripts')
    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeSidebar?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
    </script>
@endpush
