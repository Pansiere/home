<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    "resources/css/global.css",
    @vite(['resources/js/app.js', 'resources/css/listagem.css', 'resources/css/formulario.css', 'resources/css/global.css'])
    <title>{{$title}}</title>
</head>

<body>
    {{$slot}}
</body>

</html>