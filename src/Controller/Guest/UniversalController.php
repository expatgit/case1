<?php


namespace App\Controller\Guest;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class UniversalController extends AbstractController
{
    public function renderDefault()
    {
        return [
            'title' => 'Добро пожаловать, Гость'
        ];
    }
}