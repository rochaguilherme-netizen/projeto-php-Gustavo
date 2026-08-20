<?php

$anterior = 0;
$atual = 1;

for ($i = 1; $i <= 15; $i++) {
    echo $anterior . " ";

    $proximo = $anterior + $atual;
    $anterior = $atual;
    $atual = $proximo;
}

?>