<?php
    function exibeMensagem ($mensagem){
        echo $mensagem .PHP_EOL;
    }
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
        exibeMensagem(mensagem:"Você não pode sacar.");
    }   else {
        $contasCorrentes ['123.456.789-31'] ['saldo'] -= 500;
    }
      foreach ($contasCorrentes as $cpf => $conta) {
        exibeMensagem(mensagem: $cpf . " " . $conta['titular'] . ' ' . $conta['saldo']);
    }
?>