<?php

namespace App\Entity;

class Page 
{
    protected $page_num;
    protected $ref_album;

    public function getNum()
    {
        return $this->page_num;
    }
    public function getRefAlbum()
    {
        return $this->ref_album;
    }
    public function setNum($page_num)
    {
        $this->page_num = $page_num;
    }
    public function setRefAlbum($ref_album)
    {
        $this->ref_album = $ref_album;
    }
}