<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JuronsRepository")
 */
class Jurons
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $jurons_num;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $jurons_texte;


    public function getJuronsNum(): ?int
    {
        return $this->jurons_num;
    }

    public function setJuronsNum(int $jurons_num): self
    {
        $this->jurons_num = $jurons_num;

        return $this;
    }

    public function getJuronsTexte(): ?string
    {
        return $this->jurons_texte;
    }

    public function setJuronsTexte(string $jurons_texte): self
    {
        $this->jurons_texte = $jurons_texte;

        return $this;
    }
}
