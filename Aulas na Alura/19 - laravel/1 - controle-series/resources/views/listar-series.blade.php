<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Series</title>
</head>

<body>
    <h1>Séries</h1>
    <ul>
        @foreach ($series as $serie)
        <li>{{$serie}}</li>
        @endforeach
    </ul>
</body>

</html>