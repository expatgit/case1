<?php


namespace App\Controller\Admin;


use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SupremeAdminController extends AdminBaseController

{
    /**
     * @Route("/admin/user", name="admin-user")
     * @return Response
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        $forRender = parent::renderDefault();
        $forRender['title'] = 'Пользователи';
        $forRender['users'] = $users;
        return $this->render('admin/user/userindex.html.twig', $forRender);
    }

}