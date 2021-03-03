<?php

namespace App\Controller\Guest;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {

        return $this->render('guest/guestindex.html.twig', [
            'title' => 'Главная страница',
            ]
        );
    }
}