<?php

require_once '12.1funcoes.php';

$cliente = [
    "titular" => "João Pedro V. Pansiere",
    "saldoAtual" => 0,
    "historico" => []
];

while (true) {

    $opcao = lista_opcoes($cliente);

    switch ($opcao) {
        case 1:
            echo "\nConsultando histórico...\n";
            consultar_historico($cliente);
            break;
        case 2:
            echo "\nDepositar valor\n";
            depositar_valor($cliente);
            break;
        case 3:
            echo "\nSacar valor\n";
            sacar_valor($cliente);
            break;
        case 4:
            echo "\nSaindo...\n";
            exit;
        default:
            echo "\nOpção inválida, por favor tente novamente.\n\n";
            break;
    }
}
