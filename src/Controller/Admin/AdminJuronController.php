<?php
namespace App\Controller\Admin;

use App\Entity\Juron;
use App\Form\JuronType;
use App\Repository\JuronRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminJuronController extends AbstractController
{
    private $repository;

    public function __construct(JuronRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * @Route("/administration/jurons", name="admin.juron")
     */
    public function index()
    {
        $jurons = $this->repository->findAll();
        return $this->render('admin/juron/list.html.twig', [
            'jurons' => $jurons
        ]);
    }

    /**
     * @Route("/administration/jurons/create", name="admin.juron.create")
     */
    public function new(Request $request)
    {
        $juron = new Juron();
        $form = $this->createForm(JuronType::class, $juron);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $data = $form->getData();
            $this->repository->addJuron($data->getTexte());

            return $this->redirectToRoute('admin.juron');
        }
        return $this->render('admin/juron/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/jurons/edit/{num}", name="admin.juron.edit")
     */
    public function edit(Request $request, $num)
    {
        $juron = $this->repository->find($num);
        $form = $this->createForm(JuronType::class, $juron);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $this->repository->updateJuron($num, $data->getNum(), $data->getTexte());

            return $this->redirectToRoute('admin.juron');
        }
        return $this->render('admin/juron/edit.html.twig', [
            'juron' => $juron,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/jurons/delete/{num}", name="admin.juron.delete")
     */
    public function delete(Request $request, $num)
    {
        $juron = $this->repository->find($num);
        $form = $this->createFormBuilder()->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->repository->deleteAlbum($num);
            return $this->redirectToRoute('admin.juron');
        }
        return $this->render('admin/juron/delete.html.twig', [
            'juron' => $juron,
            'form' => $form->createView()
        ]);
    }
}
