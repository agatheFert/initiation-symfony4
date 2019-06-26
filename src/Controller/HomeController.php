<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function home(): Response   {
        // return new Response('<h1>Réponse Symfony</h1>');
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/contact")
     * @return Response
     */

    public function contact(): Response   {
        // return new Response('<h1>Réponse Symfony</h1>');
        return $this->render('contact.html.twig');
    }



}