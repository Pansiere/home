<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

new #[Layout('layouts.guest')] class extends Component 
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="bg-white min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md space-y-8">
        <!-- Welcome message -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-blue-600">Seja bem-vindo(a)</h1>
            <p class="text-2xl text-gray-800 mt-2">Login</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form wire:submit="login" class="bg-white rounded-lg shadow-sm p-8 border">
            <div class="space-y-6">
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email"
                        name="email" required autofocus autocomplete="username" placeholder="Digite seu email" />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Senha')" />
                    <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                        name="password" required autocomplete="current-password" placeholder="Digite sua senha"/>
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember" class="flex items-center">
                        <input wire:model="form.remember" id="remember" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    <a href="#" wire:navigate class="text-sm text-gray-600 hover:text-gray-900 underline">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                </div>

                <!-- Login Button -->
                <x-primary-button class="w-full justify-center">
                    {{ __('Entrar') }}
                </x-primary-button>

                <!-- Registration Link -->
                <div class="text-center text-sm text-gray-600">
                    {{ __('Não tem uma conta?') }}
                    <a href="{{ route('register') }}" wire:navigate
                        class="text-purple-600 hover:text-purple-800 underline ml-1">
                        {{ __('Registre-se') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
