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

    public function updateAlbum($ref, $_ref, $_titre, $_parution, $_tome, $_image)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare(
           "UPDATE album
            SET album_ref = :_ref,
                album_parution = :_parution,
                album_titre = :_titre,
                album_tome = :_tome,
                album_image = :_image
            WHERE album_ref = :ref
        ");

        $result->execute(array(
            "_ref" => $_ref,
            "_parution" => $_parution,
            "_titre" => $_titre,
            "_tome" => $_tome,
            "_image" => $_image,
            "ref" => $ref
        ));
    }

    public function addAlbum($_ref, $_titre, $_parution, $_tome, $_image)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare(
           "INSERT INTO album(album_ref, album_titre, album_parution, album_tome, album_image)
            VALUES (:_ref, :_titre, :_parution, :_tome, :_image)
        ");

        $result->execute(array(
            "_ref" => $_ref,
            "_parution" => $_parution,
            "_titre" => $_titre,
            "_tome" => $_tome,
            "_image" => $_image
        ));
    }

    public function deleteAlbum($ref)
    {
        $pdo = DatabaseConnection::getDatabaseConnection();
        $result = $pdo->prepare("DELETE FROM album WHERE album_ref = :ref");
        $result->execute(array("ref" => $ref));
    }
}
