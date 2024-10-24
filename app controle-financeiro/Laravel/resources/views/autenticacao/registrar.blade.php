<x-layout title="Registrar">
    <h1>Registro de Usuário</h1>
    <form action="{{ route('autenticacao.store') }}" method="post">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>

        <label for="senha_confirmation">Confirmar Senha:</label>
        <input type="password" id="senha_confirmation" name="senha_confirmation" required>
        <br>

        <button type="submit">Registrar</button>
    </form>

    <p>Já tem uma conta? <a href="{{ route('autenticacao.index') }}">Faça login</a></p>
</x-layout>
