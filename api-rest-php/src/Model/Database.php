<?php

namespace App\Model;

use App\Config\Config; // Importando a classe Config

use Exception;

class Database
{
    public function select($limit): array
    {
        try {
            $users = json_decode(file_get_contents(Config::DATABASE_FILE), true); // Usando a constante
            return array_slice($users, 0, $limit);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
