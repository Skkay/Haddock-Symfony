<?php
namespace App\Controller\Admin;

use App\Entity\Bande;
use App\Form\BandeType;
use App\Repository\BandeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminBandeController extends AbstractController
{
    private $repository;

    public function __construct(BandeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/administration/bandes", name="admin.bande")
     */
    public function index()
    {
        $bandes = $this->repository->findAll();
        return $this->render('admin/bande/list.html.twig', [
            'bandes' => $bandes
        ]);
    }

    /**
     * @Route("/administration/bandes/create", name="admin.bande.create")
     */
    public function new(Request $request)
    {
        $bande = new Bande();
        $form = $this->createForm(BandeType::class, $bande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $this->repository->addBande($data->getRefAlbum(), $data->getPageNum(), $data->getBandePlace());

            return $this->redirectToRoute('admin.bande');
        }
        return $this->render('admin/bande/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/bandes/edit/{ref}-{num}-{place}", name="admin.bande.edit")
     */
    public function edit(Request $request, $ref, $num, $place)
    {
        $bande = $this->repository->find($ref, $num, $place);
        $form = $this->createForm(BandeType::class, $bande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $this->repository->updateBande($ref, $num, $place, $data->getRefAlbum(), $data->getPageNum(), $data->getBandePlace());

            return $this->redirectToRoute('admin.bande');
        }
        return $this->render('admin/bande/edit.html.twig', [
            'bande' => $bande,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/bandes/delete/{ref}-{num}-{place}", name="admin.bande.delete")
     */
    public function delete(Request $request, $ref, $num, $place)
    {
        $bande = $this->repository->find($ref, $num, $place);
        $form = $this->createFormBuilder()->getForm();
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $this->repository->deleteBande($ref, $num, $place);
            return $this->redirectToRoute('admin.bande');
        }
        return $this->render('admin/bande/delete.html.twig', [
            'bande' => $bande,
            'form' => $form->createView()
        ]);
    }
}
