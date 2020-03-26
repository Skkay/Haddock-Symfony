<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BandeRepository")
 */
class Bande
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=1)
     */
    private $bande_place;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $num_page;

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=5)
     */
    private $ref_album;

    
    public function getBandePlace(): ?string
    {
        return $this->bande_place;
    }

    public function setBandePlace(string $bande_place): self
    {
        $this->bande_place = $bande_place;

        return $this;
    }

    public function getNumPage(): ?int
    {
        return $this->num_page;
    }

    public function setNumPage(int $num_page): self
    {
        $this->num_page = $num_page;

        return $this;
    }

    public function getRefAlbum(): ?string
    {
        return $this->ref_album;
    }

    public function setRefAlbum(string $ref_album): self
    {
        $this->ref_album = $ref_album;

        return $this;
    }
}
