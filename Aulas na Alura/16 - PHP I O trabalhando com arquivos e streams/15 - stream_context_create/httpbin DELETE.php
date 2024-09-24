<?php

$contexto = stream_context_create([
    'http' => [
        'method' => 'DELETE',
        'header' => 'X-From: PHP'
    ]
]);
echo file_get_contents('http://httpbin.org/delete ', false, $contexto);
