<?php

/*
PRECISO sempre verificar se o arquivo
esperado é VALIDO, não receber arquivos
executáveis por upload, etc
*/

var_dump($_FILES);

var_dump(move_uploaded_file($_FILES['arquivo']['tmp_name'], __DIR__ . '/a.pdf'));

echo __DIR__;
