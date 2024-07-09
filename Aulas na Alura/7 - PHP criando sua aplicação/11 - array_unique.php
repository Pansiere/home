<?php

$array = [1, 1, 2, 2, 3, 4, 4, 5];
$semDuplicatas = array_unique($array);

foreach ($semDuplicatas as $sem) {
    echo "$sem\n";
}
