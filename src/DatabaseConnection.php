<?php
namespace App;

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpKernel\KernelInterface;

class DatabaseConnection
{
    private $appKernel;
    private $dotenv;

    public function __construct(KernelInterface $appKernel, Dotenv $dotenv)
    {
        $this->appKernel = $appKernel;
        $this->dotenv = $dotenv;

        $this->$dotenv->load($this->appKernel->getProjectDir().'/.env');
    }

    public static function getDatabaseConnection()
    {
        try {
            $dsn = "mysql:dbname=" . $_ENV['PDO_DBNAME'] . ";host=" . $_ENV['PDO_HOST'] . ";charset=" . $_ENV['PDO_CHARSET'];
            $pdo = new \PDO($dsn, $_ENV['PDO_USER'], $_ENV['PDO_PASSWD']);
            return $pdo;
        }
        catch (Exception $e)
        {
            throw new \Exception($e->getMessage());
        }
    }
}