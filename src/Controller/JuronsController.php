<?php
namespace App\Controller;

use App\Repository\JuronsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(PaginatorInterface $paginator, Request $request) : Response
    {
        //$jurons = $this->repository->findAll();
        $jurons = $paginator->paginate(
            $this->repository->findAll(),
            $request->query->getInt('page', 1),
            50
        );
        return $this->render('jurons/index.html.twig', [
            'jurons' => $jurons
        ]);
    }
}
