<?php

namespace App\Model;

class UserModel extends Database
{
    // Método que retorna os usuários com base em um limite fornecido
    public function getUsers($limit)
    {
        // Chama o método 'select' da classe pai 'Database' e passa o limite como argumento
        return $this->select($limit);
    }
}