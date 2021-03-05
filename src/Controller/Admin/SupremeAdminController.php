<?php


namespace App\Controller\Admin;


use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;

class SupremeAdminController extends AdminBaseController

{
    /**
     * @Route("admin/user", name="admin_user")
     * @return Response
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        $forRender = parent::renderDefault();
        $forRender['title'] = 'Пользователи';
        $forRender['users']= $users;
        return $this->render('Admin/user/index.html.twig', $forRender);

    }
}