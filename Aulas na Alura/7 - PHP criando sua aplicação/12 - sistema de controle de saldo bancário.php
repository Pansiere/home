<?php
function opcoes($cliente)
{
    echo "***************************\n";

    echo "Titular: " . $cliente['titular'] . "\nSaldo atual: " . $cliente['saldoAtual'] . PHP_EOL;

    echo "***************************\n";
    echo "1. Consultar saldo atual\n";
    echo "2. Sacar valor\n";
    echo "3. Depositar valor\n";
    echo "4. Sair\n";

    $valor = readline("Digite uma opção: ");
    return $valor;
}

function consultar_saldo_atual($cliente)
{
}

function sacar_valor($cliente)
{
}

function depositar_valor($cliente)
{
}

$cliente = [
    "titular" => "João Pedro V. Pansiere",
    "saldoAtual" => 0
];

$lista_opcoes = match (opcoes($cliente)) {
    "1" => consultar_saldo_atual($cliente),
    "2" => sacar_valor($cliente),
    "3" => depositar_valor($cliente),
    "4" => "Saindo...\n",

    default => "Opção inválida" . opcoes($cliente),
};
