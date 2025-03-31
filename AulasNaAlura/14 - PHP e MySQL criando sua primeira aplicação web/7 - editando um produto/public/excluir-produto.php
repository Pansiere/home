<?php

require_once 'src/code.php';

$produtoRepositorio->deletar($_POST['id']);

header("Location: admin.php");
