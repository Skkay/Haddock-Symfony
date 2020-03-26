<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlbumRepository")
 */
class Album
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=5)
     */
    private $album_ref;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $album_titre;

    /**
     * @ORM\Column(type="integer")
     */
    private $album_parution;

    /**
     * @ORM\Column(type="integer")
     */
    private $album_tome;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $album_image;
    

    public function getAlbumRef(): ?string
    {
        return $this->album_ref;
    }

    public function setAlbumRef(string $album_ref): self
    {
        $this->album_ref = $album_ref;

        return $this;
    }

    public function getAlbumTitre(): ?string
    {
        return $this->album_titre;
    }

    public function setAlbumTitre(string $album_titre): self
    {
        $this->album_titre = $album_titre;

        return $this;
    }

    public function getAlbumParution(): ?int
    {
        return $this->album_parution;
    }

    public function setAlbumParution(int $album_parution): self
    {
        $this->album_parution = $album_parution;

        return $this;
    }

    public function getAlbumTome(): ?int
    {
        return $this->album_tome;
    }

    public function setAlbumTome(int $album_tome): self
    {
        $this->album_tome = $album_tome;

        return $this;
    }

    public function getAlbumImage(): ?string
    {
        return $this->album_image;
    }

    public function setAlbumImage(string $album_image): self
    {
        $this->album_image = $album_image;

        return $this;
    }
}
