<?php
namespace App\Controller\Admin;

use App\Entity\Album;
use App\Form\AlbumType;
use App\Repository\AlbumRepository;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/administration/albums/edit/{ref}", name="admin.album.edit")
     */
    public function edit(Request $request, $ref)
    {
        $album = $this->repository->find($ref);
        $form = $this->createForm(AlbumType::class, $album);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $this->repository->updateAlbum($ref, $data->getRef(), $data->getTitre(), $data->getParution(), $data->getTome(), $data->getImage());

            return $this->redirectToRoute('admin.album');
        }

        return $this->render('admin/album/edit.html.twig', [
            'album' => $album,
            'form' => $form->createView()
        ]);
    }
}
