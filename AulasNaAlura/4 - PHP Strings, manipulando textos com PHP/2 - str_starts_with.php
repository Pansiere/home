<?php

$url = 'https://pansiere.com';
$url2 = 'http://pansiere.com';

if (str_starts_with($url, 'https')) {
    echo "$url é uma url segua.\n";
} else {
    echo "\n$url não uma url segura.";
}

if (str_starts_with($url2, 'https')) {
    echo "\n$url2 é uma url segua.";
} else {
    echo "\n$url2 não uma url segura.";
}
