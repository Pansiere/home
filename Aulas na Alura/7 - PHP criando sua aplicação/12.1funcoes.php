<?php
function lista_opcoes($cliente)
{
    echo "***************************\n";

    echo "Titular: " . $cliente['titular'] . "\nSaldo atual: R$" . $cliente['saldoAtual'] . ",00\n";

    echo "***************************\n";
    echo "1. Consultar saldo atual\n";
    echo "2. Sacar valor\n";
    echo "3. Depositar valor\n";
    echo "4. Sair\n";

    $valor = readline("Digite o número da opção desejada: ");
    echo "\nOpção selecionada: " . $valor;
    return $valor;
}

function consultar_saldo_atual($cliente)
{
    echo "Saldo atual: R$" . $cliente['saldoAtual'] . ",00.\n\n";
}

function sacar_valor(&$cliente)
{
    $saqueValor = readline("Digite o valor a ser sacado: ");

    if ($saqueValor > $cliente["saldoAtual"]) {
        echo "\nSaldo insuficiente\nSaque não concluído.\n\n";
    } else {
        $cliente['saldoAtual'] -= $saqueValor;
        echo "Saque concluído com sucesso.\n\n";
    }
}

function depositar_valor(&$cliente)
{
    $saqueValor = (float) readline("Digite o valor a ser depositado: ");

    $cliente['saldoAtual'] += $saqueValor;

    echo "Depósito concído com sucesso.\n\n";
}
