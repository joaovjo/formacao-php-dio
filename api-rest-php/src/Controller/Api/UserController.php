<?php

namespace App\Controller\Api;

use App\Model\UserModel;
use Error;

class UserController extends BaseController
{
    public function listAction()
    {
        $errorDescription = ''; // Variável para armazenar a descrição do erro, inicialmente vazia
        $requestMethod = $_SERVER["REQUEST_METHOD"]; // Obtém o método da requisição HTTP
        $stringParamsArray = $this->getStringParams(); // Obtém os parâmetros da requisição como uma matriz de strings

        if (strtoupper($requestMethod) == 'GET') { // Verifica se o método da requisição é GET
            try {
                $userModel = new UserModel(); // Cria uma instância do modelo de usuário

                $intLimit = 10; // Define um limite padrão para a quantidade de usuários retornados
                if (isset($stringParamsArray['limit']) && $stringParamsArray['limit']) {
                    $intLimit = $stringParamsArray['limit']; // Se o parâmetro 'limit' estiver presente na requisição, atualiza o limite com o valor fornecido
                }

                $usersArray = $userModel->getUsers($intLimit); // Obtém um array de usuários do modelo de usuário
                $responseData = json_encode($usersArray); // Converte o array de usuários em uma string JSON
            } catch (Error $e) {
                $errorDescription = $e->getMessage() . 'Something went wrong! Please contact support.'; // Se ocorrer um erro, armazena a descrição do erro
                $errorHeader = 'HTTP/1.1 500 Internal Server Error'; // Define o cabeçalho de resposta para indicar um erro interno do servidor
            }
        } else {
            $errorDescription = 'Method not supported'; // Se o método da requisição não for GET, define a descrição do erro
            $errorHeader = 'HTTP/1.1 422 Unprocessable Entity'; // Define o cabeçalho de resposta para indicar uma entidade não processável
        }

        if (!$errorDescription) { // Se não houver descrição de erro
            $this->sendOutput(
                $responseData,
                ['Content-Type: application/json', 'HTTP/1.1 200 OK'] // Envia a resposta com o conteúdo JSON e o cabeçalho de sucesso
            );
        } else {
            $this->sendOutput(json_encode(['error' => $errorDescription]),
                ['Content-Type: application/json', $errorHeader] // Envia a resposta com o conteúdo JSON contendo a descrição do erro e o cabeçalho de erro correspondente
            );
        }
    }
}