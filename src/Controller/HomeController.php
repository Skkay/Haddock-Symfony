<?php
namespace App\Controller;

use App\Repository\AlbumRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(AlbumRepository $repository)
    {
        $albums = $repository->findAll();
        return $this->render('home.html.twig', [
            'albums' => $albums
        ]);
    }
}
