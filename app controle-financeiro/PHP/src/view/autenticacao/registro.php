<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/styles/autenticacao/registro.css" />
    <title>Controle Financeiro</title>
</head>

<body>
    <h1>Registro de Usuário</h1>
    <form action="/autenticacao/registro/registrar" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>

        <button type="submit">Registrar</button>
    </form>

    <p>Já tem uma conta? <a href="/autenticacao/login">Faça login</a></p>
</body>

</html>