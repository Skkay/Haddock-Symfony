<?php
namespace App\Controller\Admin;

use App\Entity\CaseBulle;
use App\Form\CaseBulleType;
use App\Repository\CaseBulleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminCaseBulleController extends AbstractController
{
    private $repository;

    public function __construct(CaseBulleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/administration/cases", name="admin.case")
     */
    public function index()
    {
        $caseBulles = $this->repository->findAll();
        return $this->render('admin/case_bulle/list.html.twig', [
            'caseBulles' => $caseBulles
        ]);
    }

    /**
     * @Route("/administration/cases/create", name="admin.case.create")
     */
    public function new(Request $request)
    {
        $caseBulle = new CaseBulle();
        $form = $this->createForm(CaseBulleType::class, $caseBulle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $this->repository->addCaseBulle($data->getRefAlbum(), $data->getPageNum(), $data->getBandePlace(), $data->getCaseNum());

            return $this->redirectToRoute('admin.case');
        }
        return $this->render('admin/case_bulle/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/cases/edit/{ref}-{num}-{place}-{case}", name="admin.case.edit")
     */
    public function edit(Request $request, $ref, $num, $place, $case) 
    {
        $caseBulle = $this->repository->find($ref, $num, $place, $case);
        $form = $this->createForm(CaseBulleType::class, $caseBulle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $data = $form->getData();
            $this->repository->updateCaseBulle($ref, $num, $place, $case, $data->getRefAlbum(), $data->getPageNum(), $data->getBandePlace(), $data->getCaseNum());

            return $this->redirectToRoute('admin.case');
        }
        return $this->render('admin/case_bulle/edit.html.twig', [
            'caseBulle' => $caseBulle,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/cases/delete/{ref}-{num}-{place}-{case}", name="admin.case.delete")
     */
    public function delete(Request $request, $ref, $num, $place, $case)
    {
        $caseBulle = $this->repository->find($ref, $num, $place, $case);
        $form = $this->createFormBuilder()->getForm();
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $this->repository->deleteCaseBulle($ref, $num, $place, $case);
            return $this->redirectToRoute('admin.case');
        }
        return $this->render('admin/case_bulle/delete.html.twig', [
            'caseBulle' => $caseBulle,
            'form' => $form->createView()
        ]);
    }
}
