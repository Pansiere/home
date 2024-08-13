<?php

require_once 'src/code.php';

$produtudoRepositorio->deletar($_POST['id']);

header("Location: admin.php");
