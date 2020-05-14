<?php

namespace App\Repository;

use App\DatabaseConnection;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpKernel\KernelInterface;

class BandeRepository 
{
    public function findAll()
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM bande ORDER BY ref_album, num_page, bande_place")->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Bande');
        return $result;
    }

    public function find($ref, $num, $place)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM bande WHERE bande_place = '$place' AND num_page = '$num' AND ref_album = '$ref'")->fetchObject('App\Entity\Bande');
        return $result;
    }

    public function addBande($_ref, $_num, $_place)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("INSERT INTO bande(bande_place, num_page, ref_album) VALUES (:_place, :_num, :_ref)");
        $result->execute(array("_place" => $_place, "_num" => $_num, "_ref" => $_ref));
    }

    public function updateBande($ref, $num, $place, $_ref, $_num, $_place)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("UPDATE bande SET bande_place = :_place, num_page = :_num, ref_album = :_ref WHERE bande_place = :place AND num_page = :num AND ref_album = :ref");
        $result->execute(array("_place" => $_place, "_num" => $_num, "_ref" => $_ref, "place" => $place, "num" => $num, "ref" => $ref));
    }

    public function deleteBande($ref, $num, $place)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("DELETE FROM bande WHERE bande_place = :place AND num_page = :num AND ref_album = :ref");
        $result->execute(array("place" => $place, "num" => $num, "ref" => $ref));
    }
}
