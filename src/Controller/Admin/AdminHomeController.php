<?php


namespace App\Controller\Admin;


use App\Controller\Guest\UniversalController;
use Symfony\Component\Routing\Annotation\Route;


class AdminHomeController extends AdminBaseController
{
    /**
     * @Route("/admin", name="admin_home")
     *
     */
    public function index()
    {
        $forRender = parent::renderDefault();
        return $this->render('admin/adminindex.html.twig', $forRender);
    }
}