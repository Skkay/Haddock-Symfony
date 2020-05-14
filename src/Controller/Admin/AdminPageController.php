<?php
namespace App\Controller\Admin;

use App\Entity\Page;
use App\Form\PageType;
use App\Repository\PageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPageController extends AbstractController
{
    private $repository;

    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/administration/pages", name="admin.page")
     */
    public function index()
    {
        $pages = $this->repository->findAll();
        return $this->render('admin/page/list.html.twig', [
            'pages' => $pages
        ]);
    }

    /**
     * @Route("/administration/pages/create", name="admin.page.create")
     */
    public function new(Request $request)
    {
        $page = new Page();
        $form = $this->createForm(PageType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $this->repository->addPage($data->getRefAlbum(), $data->getNum());

            return $this->redirectToRoute('admin.page');
        }
        return $this->render('admin/page/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/pages/edit/{ref}-{num}", name="admin.page.edit")
     */
    public function edit(Request $request, $ref, $num)
    {
        $page = $this->repository->find($ref, $num);
        $form = $this->createForm(PageType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $this->repository->updatePage($num, $ref, $data->getNum(), $data->getRefAlbum());

            return $this->redirectToRoute('admin.page');
        }
        return $this->render('admin/page/edit.html.twig', [
            'page' => $page,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/administration/pages/delete/{ref}-{num}", name="admin.page.delete")
     */
    public function delete(Request $request, $ref, $num)
    {
        $page = $this->repository->find($ref, $num);
        $form = $this->createFormBuilder()->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->repository->delete($ref, $num);
            return $this->redirectToRoute('admin.page');
        }
        return $this->render('admin/page/delete.html.twig', [
            'page' => $page,
            'form' => $form->createView()
        ]);
    }
}
