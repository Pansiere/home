<?php

require_once '7 - funcoes.php';

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

$contasCorrentes['123.456.789-21'] = depositar($contasCorrentes['123.456.789-21'], valorADepositar: -900);
$contasCorrentes['123.456.789-11'] = sacar($contasCorrentes['123.456.789-11'], valorASacar: 500);
$contasCorrentes['123.456.789-31'] = sacar($contasCorrentes['123.456.789-31'], valorASacar: 500);

titularComLetrasMaiusculas($contasCorrentes['123.456.789-11']);

foreach ($contasCorrentes as $cpf => $conta) {
    ['titular' => $titular, 'saldo' => $saldo] = $conta;
    exibeMensagem(
        mensagem: "$cpf $titular $saldo"
    );
}
?>