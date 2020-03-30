<?php
namespace App\Controller;

use App\Repository\JuronsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JuronsController extends AbstractController
{
    private $repository;

    public function __construct(JuronsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/jurons", name="jurons.index")
     */
    public function index() : Response
    {
        $jurons = $this->repository->findAll();
        return $this->render('jurons/index.html.twig', [
            'jurons' => $jurons
        ]);
    }
}
