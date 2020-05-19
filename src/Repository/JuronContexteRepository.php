<?php

namespace App\Repository;

use App\DatabaseConnection;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpKernel\KernelInterface;

class JuronContexteRepository 
{
    public function findAll()
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query(
           "SELECT jurons.jurons_num, se_trouver_bulle.num_case, se_trouver_bulle.place_bande, 
                se_trouver_bulle.num_page, se_trouver_bulle.ref_album
            FROM jurons, se_trouver_bulle, album
            WHERE jurons.jurons_num = se_trouver_bulle.jurons_num
            AND se_trouver_bulle.ref_album LIKE album.album_ref
            ORDER BY se_trouver_bulle.ref_album, se_trouver_bulle.num_page, se_trouver_bulle.place_bande, se_trouver_bulle.num_case, jurons.jurons_num
        ")->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\JuronContexte');
        return $result;
    }

    public function find($ref, $num, $place, $case, $juron)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM se_trouver_bulle WHERE jurons_num = '$juron' AND num_case = '$case' AND num_page = '$num' AND place_bande = '$place' AND ref_album = '$ref'")->fetchObject('App\Entity\JuronContexte');
        return $result;
    }

    public function addJuronContexte($_ref, $_num, $_place, $_case, $_juron)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("INSERT INTO se_trouver_bulle(jurons_num, num_case, place_bande, num_page, ref_album) VALUES (:_juron, :_case, :_place, :_num, :_ref)");
        $result->execute(array("_juron" => $_juron, "_case" => $_case, "_place" => $_place, "_num" => $_num, "_ref" => $_ref));
    }

    public function deleteJuronContexte($ref, $num, $place, $case, $juron)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("DELETE FROM se_trouver_bulle WHERE jurons_num = :juron AND num_case = :case AND num_page = :num AND place_bande = :place AND ref_album = :ref");
        $result->execute(array("juron" => $juron, "case" => $case, "num" => $num, "place" => $place, "ref" => $ref));
    }
}
