<?php


namespace App\Controller\Admin;


use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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

    /**
     * @Route("admin/user/create", name="admin_user_create")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return RedirectResponse\Response
     */
    public function create(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User(); // создание нового объекта пользователя, шаблон нового пользователя
        $form = $this->createForm(UserType::class, $user); // создание формы, принимает на вход сущность User
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request); // обработка формы (handlerRequest, принимает на вход $request)

        if(($form->isSubmitted()) && ($form->isValid())) // проверка формы - на нажатие кнопки + на валидацию формы
        {
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->$setPassword($password);
            $user->setRoles(["ROLE_ADMIN"]);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('admin_user');
        }
        $forRender = parent::renderDefault();
        $forRender['title'] = 'Форма создания пользователя';
        $forRender['form'] = $form->createView();
        return $this->render('admin/user/form.html.twig', $forRender);
    }
}