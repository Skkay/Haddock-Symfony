<?php

namespace App\Entity;

use Ausi\SlugGenerator\SlugGenerator;

class Album 
{
    public $album_ref;
    public $album_titre;
    public $parution;
    public $tome;
    public $image;

    public function getSlug()
    {
        return (new SlugGenerator)->generate($this->album_titre);
    }
}