<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeTrouverBulleRepository")
 */
class SeTrouverBulle
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $num_case;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $num_page;

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=1)
     */
    private $place_bande;

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=5)
     */
    private $ref_album;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $jurons_num;


    public function getNumCase(): ?int
    {
        return $this->num_case;
    }

    public function setNumCase(int $num_case): self
    {
        $this->num_case = $num_case;

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

    public function getPlaceBande(): ?string
    {
        return $this->place_bande;
    }

    public function setPlaceBande(string $place_bande): self
    {
        $this->place_bande = $place_bande;

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

    public function getJuronsNum(): ?int
    {
        return $this->jurons_num;
    }

    public function setJuronsNum(int $jurons_num): self
    {
        $this->jurons_num = $jurons_num;

        return $this;
    }
}
