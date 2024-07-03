<?php

$url = 'https://pansiere.com.br/';

if (str_starts_with($url, 'https')) {
    echo "$url é uma url segua.\n";
} else {
    echo "\n$url não uma url segura.";
}

echo PHP_EOL;

if (str_ends_with($url, '.br') || str_ends_with($url, '.br/')) {
    echo "$url é um domínio do Brasil.\n";
} else {
    echo "$url não é um domínio do Brasil.";
}
