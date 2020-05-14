<?php

namespace App\Repository;

use App\DatabaseConnection;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpKernel\KernelInterface;

class PageRepository 
{
    public function findAll()
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM page")->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Page');
        return $result;
    }

    public function find($ref, $num)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM page WHERE page_num = '$num' AND ref_album = '$ref'")->fetchObject('App\Entity\Page');
        return $result;
    }

    public function addPage($_ref, $_num)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("INSERT INTO page(page_num, ref_album) VALUES (:_num, :_ref)");
        $result->execute(array("_ref" => $_ref, "_num" => $_num));
    }

    public function updatePage($num, $ref, $_num, $_ref)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("UPDATE page SET page_num = :_num, ref_album = :_ref WHERE page_num = :num AND ref_album = :ref");
        $result->execute(array("_num" => $_num, "_ref" => $_ref, "num" => $num, "ref" => $ref));
    }

    public function delete($ref, $num)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("DELETE FROM page WHERE page_num = :num AND ref_album = :ref");
        $result->execute(array("ref" => $ref, "num" => $num));
    }
}
