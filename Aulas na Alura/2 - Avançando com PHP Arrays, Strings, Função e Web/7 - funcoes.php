<?php
    echo "Olá. Arquivos de funções aqui.\n";

    function sacar(array $conta, float $valorASacar) : array 
    {
        if ($valorASacar > $conta ['saldo']) {
            exibeMensagem(mensagem:"Você não pode sacar.");
        } else {
            $conta ['saldo'] -= $valorASacar;
        }
        return $conta;
    }
    function exibeMensagem($mensagem){
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
    function titularComLetrasMaiusculas(array &$conta){
        $conta['titular'] = mb_strtoupper($conta['titular']);
    //    echo $conta['titular'] . PHP_EOL;
    }
    function exibeConta(array $conta){
        ['titular' => $titular, 'saldo' => $saldo] = $conta;
        echo "<li>Titular: $titular . Saldo: $saldo</li>";
    }
?>