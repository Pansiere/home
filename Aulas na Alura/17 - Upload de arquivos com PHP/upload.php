<?php

/*
PRECISO sempre verificar se o arquivo
esperado é VALIDO, não receber arquivos
executáveis por upload, etc.
Usar o 'is_uploaded_file()'
*/

var_dump($_FILES);

echo is_uploaded_file($_FILES['arquivo']);

var_dump(move_uploaded_file($_FILES['arquivo']['tmp_name'], __DIR__ . '/a.pdf'));

echo __DIR__;
