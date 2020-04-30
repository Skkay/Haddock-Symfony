<?php
namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminHomeController extends AbstractController
{
    /**
     * @Route("/administration", name="admin.home")
     */
    public function index()
    {
        return $this->render('admin/home.html.twig');
    }
}
