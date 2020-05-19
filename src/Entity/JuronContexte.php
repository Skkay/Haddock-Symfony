<?php

namespace App\Entity;

class JuronContexte 
{
    protected $jurons_num;
    protected $num_case;
    protected $num_page;
    protected $place_bande;
    protected $ref_album;

    public function getNum()
    {
        return $this->jurons_num;
    }
    public function getNumCase()
    {
        return $this->num_case;
    }
    public function getNumPage()
    {
        return $this->num_page;
    }
    public function getPlaceBande()
    {
        return $this->place_bande;
    }
    public function getRefAlbum()
    {
        return $this->ref_album;
    }

    public function setNum($jurons_num)
    {
        $this->jurons_num = $jurons_num;
    }
    public function setNumCase($num_case)
    {
        $this->num_case = $num_case;
    }
    public function setNumPage($num_page)
    {
        $this->num_page = $num_page;
    }
    public function setPlaceBande($place_bande)
    {
        $this->place_bande = $place_bande;
    }
    public function setRefAlbum($ref_album)
    {
        $this->ref_album = $ref_album;
    }
}