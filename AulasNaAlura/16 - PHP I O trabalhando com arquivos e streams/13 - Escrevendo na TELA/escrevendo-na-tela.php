<?php

// $tela = fopen('php://stdout', 'w');
$tela = fopen('php://stderr', 'w');


fwrite($tela, 'Olá mundo');
