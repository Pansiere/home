<?php
    $conta1 = [
        'titular' => 'Vinicius',
        'saldo' => 1000
    ];
    $conta2 = [
        'titular' => 'Maria',
        'saldo' => 10000
    ]; 
    $conta3 = [
        'titular' => 'Victoria',
        'saldo' => 300
    ];
    
    $contasCorrentes = [
        1234567891 => $conta1,
        1234567892 => $conta2,
        1234567893 => $conta3
    ]; 
    
    foreach ($contasCorrentes as $cpf => $conta) {
        echo $cpf . PHP_EOL;
    }
?>