<?php
namespace App\Controller\Admin;

use App\Entity\JuronContexte;
use App\Form\JuronContexteType;
use App\Repository\JuronContexteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminJuronContexteController extends AbstractController
{
    private $repository;

    public function __construct(JuronContexteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/administration/jurons_ctx", name="admin.juronctx")
     */
    public function index()
    {
        $juronsCtx = $this->repository->findAll();
        return $this->render('admin/juron_ctx/list.html.twig', [
            'juronsCtx' => $juronsCtx
        ]);
    }

    /**
     * @Route("/administration/jurons_ctx/create", name="admin.juronctx.create")
     */
    public function new(Request $request)
    {
        $juronCtx = new JuronContexte();
        $form = $this->createForm(JuronContexteType::class, $juronCtx);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $this->repository->addJuronContexte($data->getRefAlbum(), $data->getNumPage(), $data->getPlaceBande(), $data->getNumCase(), $data->getNum());

            return $this->redirectToRoute('admin.juronctx');
        }
        return $this->render('admin/juron_ctx/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/jurons_ctx/delete/{ref}-{num}-{place}-{case}-{juron}", name="admin.juronctx.delete")
     */
    public function delete(Request $request, $ref, $num, $place, $case, $juron)
    {
        $juronCtx = $this->repository->find($ref, $num, $place, $case, $juron);
        $form = $this->createFormBuilder()->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->repository->deleteJuronContexte($ref, $num, $place, $case, $juron);
            return $this->redirectToRoute('admin.juronctx');
        }
        return $this->render('admin/juron_ctx/delete.html.twig', [
            'juronCtx' => $juronCtx,
            'form' => $form->createView()
        ]);
    }
}
