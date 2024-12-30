<?php

function dividir($a, $b) {
    if ($b == 0) {
        throw new Exception("Divisão por zero!\n");
    }
    return $a / $b;
}

$status = false;

try {
    echo dividir(10, 0) . PHP_EOL;
    $status = true;
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    echo "Status da operação: " . (int) $status; // cast
    die();
}