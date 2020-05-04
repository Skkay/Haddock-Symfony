<?php

namespace App\Entity;

use Ausi\SlugGenerator\SlugGenerator;

class Album 
{
    protected $album_ref;
    protected $album_titre;
    protected $album_parution;
    protected $album_tome;
    protected $album_image;

    public function getRef()
    {
        return $this->album_ref;
    }
    public function getTitre()
    {
        return $this->album_titre;
    }
    public function getParution()
    {
        return $this->album_parution;
    }
    public function getTome()
    {
        return $this->album_tome;
    }
    public function getImage()
    {
        return $this->album_image;
    }

    public function setRef($album_ref)
    {
        $this->album_ref = $album_ref;
    }
    public function setTitre($album_titre)
    {
        $this->album_titre = $album_titre;
    }
    public function setParution($album_parution)
    {
        $this->album_parution = $album_parution;
    }
    public function setTome($album_tome)
    {
        $this->album_tome = $album_tome;
    }
    public function setImage($album_image)
    {
        $this->album_image = $album_image;
    }

    public function getSlug()
    {
        return (new SlugGenerator)->generate($this->album_titre);
    }
}