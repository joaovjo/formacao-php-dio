<?php

require_once 'Produto.php';

$produto = new Produto();

switch ($_GET['operacao']) {

    case 'list':
        var_dump($produto->list());

        echo "<h3>Produtos: </h3>";

        foreach ($produto->list() as $key => $value) {
            echo 'ID: ' . $value['id'] . '<br>';
            echo 'Descrição: ' . $value['descricao'] . '<br>';
            echo '<hr>';
        }
        break;

    case 'insert':

        $status = $produto->insert($_GET['produto']);

        if (!$status) {
            echo "Não foi possível executar a operação!";
            return false;
        }

        echo "Registro inserido com sucesso!";

        break;

    case 'update':

        $status = $produto->update($_GET['id'], $_GET['produto']);

        if (!$status) {
            echo "Não foi possível executar a operação!";
            return false;
        }

        echo "Registro atualizado com sucesso!";

        break;

    case 'delete':

        $status = $produto->delete($_GET['id']);

        if (!$status) {
            echo "Não foi possível executar a operação!";
            return false;
        }

        echo "Registro removido com sucesso!";

        break;
}