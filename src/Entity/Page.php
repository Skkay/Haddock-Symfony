<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PageRepository")
 */
class Page
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $page_num;

    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=5)
     */
    private $ref_album;


    public function getPageNum(): ?int
    {
        return $this->page_num;
    }

    public function setPageNum(int $page_num): self
    {
        $this->page_num = $page_num;

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
