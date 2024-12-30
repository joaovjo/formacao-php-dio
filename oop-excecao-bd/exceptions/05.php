<?php

function validarUsuario(array $usuario)
{
    if (empty($usuario['codigo']) || empty($usuario['nome']) || empty($usuario['idade'])) {
        throw new Exception("Campos obrigatórios não foram preenchidos!\n");
    }
    return true;
}

$usuario = [
    'codigo' => 1,
    'nome' => 'João',
    'idade' => 27,
];

$status = false;

try {
    $status = validarUsuario($usuario);
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    echo "Status da operação: " . (int) $status; // cast
    die();
}


echo "\n... executando ...\n";