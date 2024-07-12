<?php
    require_once '7.1 - funcoes.php';

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

    #$contasCorrentes['123.456.789-21'] = depositar($contasCorrentes['123.456.789-21'], valorADepositar: -900);
    #$contasCorrentes['123.456.789-11'] = sacar($contasCorrentes['123.456.789-11'], valorASacar: 500);
    #$contasCorrentes['123.456.789-31'] = sacar($contasCorrentes['123.456.789-31'], valorASacar: 500);

    titularComLetrasMaiusculas($contasCorrentes['123.456.789-11']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contas correntes</h1>

    <d1>
        <?php foreach ($contasCorrentes as $conta) { ?>
        <dt>
            <h3><?= $conta['titular']; - $cpf; ?></h3>
        </dt>
        <dd>
            Saldo: <?= $conta['saldo']; ?>
        </dd>
        <?php } ?>
    </d1>
</body>
</html>