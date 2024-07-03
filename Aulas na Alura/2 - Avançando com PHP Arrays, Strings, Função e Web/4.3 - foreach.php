<?php   
    $contasCorrentes = [
        '123.456.789-1' =>  [
            'titular' => 'Vinicius',
            'saldo' => 1000
        ],
        '123.456.789-2' =>  [
            'titular' => 'Maria',
            'saldo' => 10000
        ],
        '123.456.789-3' =>  [
            'titular' => 'Victoria',
            'saldo' => 300
        ]
    ];
    
    $contasCorrentes ['123.456.789-31'] = [
        'titular' => 'Claudia',
        'saldo' => 2000
    ];
    
    $contasCorrentes ['123.456.789-32'] = [
        'titular' => 'Claudia 2',
        'saldo' => 2000
    ];

    $contasCorrentes ['123.456.789-33'] = [
        'titular' => 'Claudia 3',
        'saldo' => 2000
    ];

    foreach ($contasCorrentes as $cpf => $conta) {
        echo $cpf . " " . $conta['titular'] . PHP_EOL;
    }
?>