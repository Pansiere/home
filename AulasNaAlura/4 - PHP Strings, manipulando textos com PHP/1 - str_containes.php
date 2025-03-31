<?php

$nome = 'João Pedro V. Pansiere';

$ehDaMinhaFamilia =  str_contains($nome, 'Pansiere');

if ($ehDaMinhaFamilia) {
    echo "$nome é da minha família";
} else {
    echo "$nome não é da minha família";
}
