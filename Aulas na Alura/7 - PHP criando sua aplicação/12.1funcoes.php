<?php
function lista_opcoes($cliente)
{
    echo "***************************\n";

    echo "Titular: " . $cliente['titular'] . "\nSaldo atual: R$" . $cliente['saldoAtual'] . PHP_EOL;

    echo "***************************\n";
    echo "1. Consultar histórico de transações\n";
    echo "2. Depositar valor\n";
    echo "3. Sacar valor\n";
    echo "4. Sair\n";

    $valor = readline("Digite o número da opção desejada: ");
    echo "\nOpção selecionada: " . $valor;
    return $valor;
}

function consultar_historico($cliente)
{
    for ($i = 0; $i < count($cliente['historico']); $i++) {
        echo $cliente['historico'][$i] . PHP_EOL;
    }
    echo PHP_EOL;
}

function depositar_valor(&$cliente)
{
    $desitoValor = (float) readline("Digite o valor a ser sacado: ");

    if ($desitoValor == 0) {
        echo "\nValor incorreto\nSaque não concluído, por favor tente novamente.\n\n";
    } else {
        $cliente['saldoAtual'] += $desitoValor;

        $cliente['historico'][] = "+\$RS" . $desitoValor . " => " . date('Y-m-d H:i:s');

        echo "Depósito concluído com sucesso.\n\n";
    }
}

function sacar_valor(&$cliente)
{
    $saqueValor = (float) readline("Digite o valor a ser sacado: ");

    if ($saqueValor > $cliente["saldoAtual"] || $saqueValor == 0) {
        echo "\nSaldo insuficiente\nSaque não concluído.\n\n";
    } else {
        $cliente['saldoAtual'] -= $saqueValor;

        $cliente['historico'][] = "-\$RS" . $saqueValor . " => " . date('Y-m-d H:i:s');

        echo "Saque concluído com sucesso.\n\n";
    }
}
