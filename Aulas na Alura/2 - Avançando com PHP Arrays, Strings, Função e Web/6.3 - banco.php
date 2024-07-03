<?php
function sacar(array $conta, float $valorASacar) : array 
{
    if ($valorASacar > $conta ['saldo']) {
        exibeMensagem(mensagem:"Você não pode sacar.");
    } else {
        $conta ['saldo'] -= $valorASacar;
    }
    return $conta;
}
function exibeMensagem ($mensagem){
    echo $mensagem .PHP_EOL;
}
function depositar(array $conta, $valorADepositar) : array {
    if ($valorADepositar > 0 ) {
    $conta ['saldo'] += $valorADepositar;
    } else {
        exibeMensagem(mensagem: "Depositos precisam ser positivos");
    }
    return $conta;
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
    ]];
$contasCorrentes['123.456.789-21'] = depositar($contasCorrentes['123.456.789-21'], valorADepositar: -900);
$contasCorrentes['123.456.789-11'] = sacar($contasCorrentes['123.456.789-11'], valorASacar: 500);
$contasCorrentes['123.456.789-31'] = sacar($contasCorrentes['123.456.789-31'], valorASacar: 500);
foreach ($contasCorrentes as $cpf => $conta) {
    exibeMensagem(
        mensagem: "$cpf $conta[titular] $conta[saldo]"
    );
}
?>