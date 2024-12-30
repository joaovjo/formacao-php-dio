<?php

declare(strict_types=1);

$pdo = null;

try {
    //$pdo = new PDO('mysql:host=localhst', 'root', '123456');
    $pdo = new PDO('mysql:host=localhost;dbname=exemplo', 'root', '123456');
    // $pdo = new PDO('sqlite:exemplo.sqlite3');
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Conexão realizada com sucesso!';
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

return $pdo;

// $query = "CREATE TABLE IF NOT EXISTS contato (contato_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT, sobrenome TEXT, endereco TEXT, telefone TEXT, email TEXT, nascimento TEXT)";
// $pdo->exec($query);