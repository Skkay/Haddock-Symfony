<?php
namespace App\Controller\Admin;

use App\Repository\AlbumRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAlbumController extends AbstractController
{
    private $repository;

    public function __construct(AlbumRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/administration/albums", name="admin.album")
     */
    public function index()
    {
        $albums = $this->repository->findAll();
        return $this->render('admin//album/list.html.twig', [
            'albums' => $albums
        ]);
    }
}
