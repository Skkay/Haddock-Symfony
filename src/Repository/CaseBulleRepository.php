<?php

namespace App\Repository;

use App\DatabaseConnection;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpKernel\KernelInterface;

class CaseBulleRepository 
{
    public function findAll()
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM case_bulle ORDER BY ref_album, num_page, place_bande, case_num")->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\CaseBulle');
        return $result;
    }

    public function find($ref, $num, $place, $case)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM case_bulle WHERE case_num = '$case' AND place_bande = '$place' AND num_page = '$num' AND ref_album = '$ref'")->fetchObject('App\Entity\CaseBulle');
        return $result;
    }

    public function addCaseBulle($_ref, $_num, $_place, $_case)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("INSERT INTO case_bulle(case_num, place_bande, num_page, ref_album) VALUES (:_case, :_place, :_num, :_ref)");
        $result->execute(array("_case" => $_case, "_place" => $_place, "_num" => $_num, "_ref" => $_ref));
    }

    public function updateCaseBulle($ref, $num, $place, $case, $_ref, $_num, $_place, $_case)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("UPDATE case_bulle SET case_num = :_case, place_bande = :_place, num_page = :_num, ref_album = :_ref WHERE case_num = :case AND place_bande = :place AND num_page = :num AND ref_album = :ref");
        $result->execute(array("_case" => $_case, "_place" => $_place, "_num" => $_num, "_ref" => $_ref, "case" => $case, "place" => $place, "num" => $num, "ref" => $ref));
    }

    public function deleteCaseBulle($ref, $num, $place, $case)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("DELETE FROM case_bulle WHERE case_num = :case AND place_bande = :place AND num_page = :num AND ref_album = :ref");
        $result->execute(array("case" => $case, "place" => $place, "num" => $num, "ref" => $ref));
    }
}
