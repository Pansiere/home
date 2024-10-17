<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/listagem.css', 'resources/js/app.js'])
    <title>{{$title}}</title>
</head>

<body>
    {{$slot}}
</body>

</html>