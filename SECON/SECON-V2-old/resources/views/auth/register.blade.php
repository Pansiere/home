<?php

use App\Models\User;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="bg-white min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md space-y-8">
        <!-- Welcome message -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-blue-600">Seja bem-vindo(a)</h1>
            <p class="text-2xl text-gray-800 mt-2">Crie sua conta</p>
        </div>

        <form wire:submit="register" class="bg-white rounded-lg shadow-sm p-8 border">
            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nome')" />
                    <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text"
                        name="name" required autofocus autocomplete="name" placeholder="Digite seu nome" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email"
                        name="email" required autocomplete="username" placeholder="Digite seu email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Senha')" />
                    <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password"
                        name="password" required autocomplete="new-password" placeholder="Digite sua senha" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
                    <x-text-input wire:model="password_confirmation" id="password_confirmation"
                        class="block mt-1 w-full" type="password" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Confirme sua senha" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Registration Actions -->
                <div class="flex items-center justify-between mt-4">
                    <a wire:navigate href="{{ route('login') }}"
                        class="text-sm text-gray-600 hover:text-gray-900 underline">
                        {{ __('Já tem uma conta?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</div>
