<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/styles/autenticacao/login.css" />
    <title>Controle Financeiro</title>
</head>

<body>
    <h1>Login</h1>

    <form action="/autenticacao/login/validar" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>

        <button type="submit">Entrar</button>
    </form>

    <p>Não tem uma conta? <a href="/autenticacao/registro">Registre-se</a></p>
</body>

</html>