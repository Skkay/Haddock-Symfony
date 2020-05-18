<?php

namespace App\Entity;

class CaseBulle 
{
    protected $case_num;
    protected $place_bande;
    protected $num_page;
    protected $ref_album;

    public function getCaseNum()
    {
        return $this->case_num;
    }
    public function getBandePlace()
    {
        return $this->place_bande;
    }
    public function getPageNum()
    {
        return $this->num_page;
    }
    public function getRefAlbum()
    {
        return $this->ref_album;
    }
    
    public function setCaseNum($case_num)
    {
        $this->case_num = $case_num;
    }
    public function setBandePlace($place_bande)
    {
        $this->place_bande = $place_bande;
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