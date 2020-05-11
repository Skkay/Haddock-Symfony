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

    public function find($num)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM jurons WHERE jurons_num = '$num'")->fetchObject('App\Entity\Juron');
        return $result;
    }

    public function findAllOccurrence()
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query(
           "SELECT jurons.jurons_texte, jurons.jurons_num, se_trouver_bulle.num_case, se_trouver_bulle.place_bande, 
                se_trouver_bulle.num_page, se_trouver_bulle.ref_album, album.album_titre
            FROM jurons, se_trouver_bulle, album
            WHERE jurons.jurons_num = se_trouver_bulle.jurons_num
            AND se_trouver_bulle.ref_album LIKE album.album_ref
            ORDER BY jurons.jurons_texte
        ")->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Juron');
        return $result;
    }

    public function addJuron($_text)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare(
           "INSERT INTO jurons(jurons_num, jurons_texte)
            VALUES (:_num, :_texte)
        ");

        $result->execute(array(
            "_num" => null,
            "_texte" => $_text
        ));
    }

    public function updateJuron($num, $_num, $_text)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare(
           "UPDATE jurons
            SET jurons_num = :_num,
                jurons_texte = :_text
            WHERE jurons_num = :num
        ");

        $result->execute(array(
            "_num" => $_num,
            "_text" => $_text,
            "num" => $num
        ));
    }

    public function deleteAlbum($num)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("DELETE FROM jurons WHERE jurons_num = :num");
        $result->execute(array("num" => $num));
    }
}
