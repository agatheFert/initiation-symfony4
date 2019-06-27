<?php


namespace App\Controller;


use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{


    public function liste(): Response
    {
        // Récupération du Repository des produits
        $repository = $this->getDoctrine()
            ->getRepository(Product::class);
        // Récupérations de tous les produits
        $products = $repository->findAll();
        // Renvoi des produits à la vue
        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }



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