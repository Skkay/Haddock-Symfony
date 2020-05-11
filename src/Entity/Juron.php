<?php

namespace App\Entity;

class Juron 
{
    protected $jurons_num;
    protected $jurons_texte;

    public function getNum()
    {
        return $this->jurons_num;
    }
    public function getTexte()
    {
        return $this->jurons_texte;
    }

    public function setNum($jurons_num)
    {
        $this->jurons_num = $jurons_num;
    }
    public function setTexte($jurons_texte)
    {
        $this->jurons_texte = $jurons_texte;
    }
}