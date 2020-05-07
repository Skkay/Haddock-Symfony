<?php

namespace App\Repository;

use App\DatabaseConnection;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpKernel\KernelInterface;

class JuronRepository 
{
    public function findAll()
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM jurons")->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Juron');
        return $result;
    }
}
