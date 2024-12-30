<?php

namespace App\Controller\Api;

class BaseController
{
    // Método mágico __call que é invocado quando um método inexistente é chamado
    public function __call($name, $arguments)
    {
        // Chama o método sendOutput passando uma string vazia como dado e um array com o cabeçalho HTTP 404 Not Found
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }

    // Método protegido que retorna um array com os parâmetros da string de consulta
    protected function getStringParams() : array
    {
        // Faz o parse da string de consulta presente na variável $_SERVER['QUERY_STRING'] e armazena os parâmetros em um array
        parse_str($_SERVER['QUERY_STRING'], $query);
        return $query;
    }

    // Método protegido que envia a saída de dados e os cabeçalhos HTTP
    protected function sendOutput($data, $httpHeaders = [])
    {
        // Remove o cabeçalho 'Set-Cookie'
        header_remove('Set-Cookie');

        // Verifica se o parâmetro $httpHeaders é um array e se possui elementos
        if (is_array($httpHeaders) && count($httpHeaders)) {
            // Itera sobre cada elemento do array $httpHeaders e define o cabeçalho HTTP correspondente
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }

        // Imprime os dados na saída
        echo $data;
        // Encerra a execução do script
        exit;
    }
}