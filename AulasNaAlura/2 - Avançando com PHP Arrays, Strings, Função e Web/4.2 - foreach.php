<?php   
    $contasCorrentes = [
        1234567891 =>  [
            'titular' => 'Vinicius',
            'saldo' => 1000
        ],
        1234567892 =>  [
            'titular' => 'Maria',
            'saldo' => 10000
        ],
        1234567893 =>  [
            'titular' => 'Victoria',
            'saldo' => 300
        ]
    ];
    
    foreach ($contasCorrentes as $cpf => $conta) {
        echo $cpf . PHP_EOL;
    }
?>