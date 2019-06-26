<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{


   public function show(string $slug): Response
   {
       //var_dump($slug);
       return $this->render('product/show.html.twig');


   }

    public function create(Request $requestHTTP): Response
    {
        // Recuperation des POSTS
        dump($requestHTTP->request);

        return $this->render('product/create.html.twig');


    }







}