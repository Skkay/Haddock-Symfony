<?php

namespace App\Entity;

class Bande 
{
    protected $bande_place;
    protected $num_page;
    protected $ref_album;

    public function getBandePlace()
    {
        return $this->bande_place;
    }
    public function getPageNum()
    {
        return $this->num_page;
    }
    public function getRefAlbum()
    {
        return $this->ref_album;
    }
    
    public function setBandePlace($bande_place)
    {
        $this->bande_place = $bande_place;
    }
    public function setPageNum($num_page)
    {
        $this->num_page = $num_page;
    }
    public function setRefAlbum($ref_album)
    {
        $this->ref_album = $ref_album;
    }
}