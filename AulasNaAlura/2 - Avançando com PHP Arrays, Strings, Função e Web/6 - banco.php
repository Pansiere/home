<?php   
    $contasCorrentes = [
        '123.456.789-11' =>  [
            'titular' => 'Vinicius',
            'saldo' => 1000
        ],
        '123.456.789-21' =>  [
            'titular' => 'Maria',
            'saldo' => 10000
        ],
        '123.456.789-31' =>  [
            'titular' => 'Victoria',
            'saldo' => 300
        ]
    ];

    $contasCorrentes ['123.456.789-11'] ['saldo'] -= 500;
    
    if (500 > $contasCorrentes ['123.456.789-31'] ['saldo']) {
        echo "Você não pode sacar esse valor." . PHP_EOL;
    }   else {
        $contasCorrentes ['123.456.789-31'] ['saldo'] -= 500;
    }

    foreach ($contasCorrentes as $cpf => $conta) {
        echo $cpf . " " . $conta['titular'] . ' ' . $conta['saldo'] . PHP_EOL;
    }
?>