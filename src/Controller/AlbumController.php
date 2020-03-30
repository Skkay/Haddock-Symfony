<?php
namespace App\Controller;

use App\Repository\AlbumRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlbumController extends AbstractController
{
    private $repository;

    public function __construct(AlbumRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/albums", name="album.index")
     */
    public function index() : Response
    {
        $albums = $this->repository->findAll();
        return $this->render('album/index.html.twig', [
            'albums' => $albums
        ]);
    }

    /**
     * @Route("/albums/{ref}-{slug}", name="album.show")
     */
    public function show($ref, $slug) : Response
    {
        $album = $this->repository->find($ref);
        $nb_jurons = $this->repository->findCountJurons($ref);
        $list_jurons = $this->repository->findAllJurons($ref);

        $album_slug = $album->getSlug();
        if ($album_slug !== $slug) 
		{
			return $this->redirectToRoute('album.show', [
				'ref' => $album->album_ref,
				'slug' => $album_slug
			], 301);
		}

        return $this->render('album/show.html.twig', [
            'album' => $album,
            'nb_jurons' => $nb_jurons,
            'list_jurons' => $list_jurons
        ]);
    }
}
