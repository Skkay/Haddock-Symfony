<?php

namespace App\Repository;

use App\DatabaseConnection;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpKernel\KernelInterface;

class AlbumRepository 
{
    public function findAll()
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM album")->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Album');
        return $result;
    }

    public function find($ref)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query("SELECT * FROM album WHERE album_ref = '$ref'")->fetchObject('App\Entity\Album');
        return $result;
    }

    public function findCountJurons($ref)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query(
           "SELECT COUNT(jurons.jurons_texte) AS nb_jurons 
            FROM jurons, se_trouver_bulle, album 
            WHERE jurons.jurons_num = se_trouver_bulle.jurons_num 
            AND se_trouver_bulle.ref_album LIKE album.album_ref 
            AND album.album_ref = '$ref'
        ")->fetch();
        return $result['nb_jurons'];
    }

    public function findAllJurons($ref)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->query(
           "SELECT jurons.jurons_texte, se_trouver_bulle.num_page 
            FROM jurons, se_trouver_bulle, album 
            WHERE jurons.jurons_num = se_trouver_bulle.jurons_num 
            AND se_trouver_bulle.ref_album LIKE album.album_ref 
            AND album.album_ref = '$ref'
        ")->fetchAll();
        return $result;
    }
}
