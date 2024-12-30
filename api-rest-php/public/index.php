<?php

require __DIR__ . '/../vendor/autoload.php'; // Inclui o arquivo autoload.php para carregar as classes automaticamente usando o Composer

use App\Controller\Api\UserController; // Importa a classe UserController do namespace App\Controller\Api
use App\Config\Config; // Importa a classe Config do namespace App\Config

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Obtém o caminho da URL atual
$uri = explode('/', $uri); // Divide o caminho da URL em partes separadas por '/'

// Verifica se a primeira parte do caminho da URL não é 'api' ou se a segunda parte não é 'v1'
if ((isset($uri[1]) && $uri[1] != 'api') || (isset($uri[2]) && $uri[2] != 'v1')) {
    header("HTTP/1.1 404 Not Found"); // Define o cabeçalho HTTP para retornar o status 404 (Not Found)
    exit(); // Encerra a execução do script
} 
// Verifica se a terceira parte do caminho da URL não é 'user' ou se a quarta parte não está definida
else if ((isset($uri[3]) && $uri[3] != 'user') || !isset($uri[4])) {
    header("HTTP/1.1 404 Not Found"); // Define o cabeçalho HTTP para retornar o status 404 (Not Found)
    exit(); // Encerra a execução do script
}

$user = new UserController(); // Cria uma nova instância da classe UserController
$methodName = $uri[4] . 'Action'; // Obtém o nome do método a ser chamado, concatenando a quarta parte do caminho da URL com 'Action'
$user->{$methodName}(); // Chama o método obtido na instância do UserController