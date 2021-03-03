<?php

namespace App\Controller\Guest;



use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends UniversalController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $forRender = parent::renderDefault();
        return $this->render('guest/guestindex.html.twig', $forRender);
    }
}