<?php
    $idadeList = [21, 23, 19, 25, 30, 41 , 18];
    #$umaIdade = $idadeList[2];

    list($idadeVinicius, , $idadeJoao) = $idadeList;
    unset($idadeList[5]);

    $idadeList [] = 20;

    foreach ($idadeList as $idade) {
        echo $idade . PHP_EOL;
    }
    echo $idadeVinicius;
?>