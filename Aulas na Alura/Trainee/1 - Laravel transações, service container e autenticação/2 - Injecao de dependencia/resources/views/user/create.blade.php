<x-layout title="Novo Usuário">
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirme sua enha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <button class="btn btn-primary mt-3">
            Registrar
        </button>

        <a href="{{ route('users.create') }}" class="btn btn-secondary mt-3">
            Voltar
        </a>
    </form>
</x-layout>
