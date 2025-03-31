<?php
    $idade = 16;
    $numeroDePessoas = 21;

    echo "Você só pode entrar se tiver mais do que 18 anos ou a partir de 16 anos acompanhado." . PHP_EOL;

    if ($idade >= 18)
        echo "Você tem $idade anos. Pode entrar sozinho";
    elseif ($idade >= 16 && $numeroDePessoas > 1)
        echo "Você tem $idade anos, está acompanhado(a), então pode entrar.";
    else{
        echo "Você só tem $idade anos. Você não pode entrar";
        echo PHP_EOL . "É uma pena.";
    }
    echo PHP_EOL;
    echo "Adeus!";
?>