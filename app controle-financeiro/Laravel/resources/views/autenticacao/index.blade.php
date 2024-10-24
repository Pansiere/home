<x-layout title="Login">
    <h1>Login</h1>

    <form action="/autenticacao/login/validar" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>

        <button type="submit">Entrar</button>
    </form>

    <p>Não tem uma conta?<a href="{{ route('autenticacao.create') }}">Registrar</a></p>
</x-layout>
