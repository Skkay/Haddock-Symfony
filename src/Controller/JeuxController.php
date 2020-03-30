<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JeuxController extends AbstractController
{
    /**
     * @Route("/jeux", name="jeux.index")
     */
    public function index()
    {
        return $this->render('jeux/index.html.twig');
    }
}
