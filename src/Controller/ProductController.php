<?php


namespace App\Controller;


use App\Entity\Category;
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
      //  $products = $repository->findAll();

        // Récupérations SEULEMENT des produits PUBLIES
        $products = $repository->findBy([
            // 'isPublished'  est la propriété de l'entité Product
            'isPublished' => true

            ]);


        // Renvoi des produits à la vue
        return $this->render('product/index.html.twig', [


        // 'products'  est une variable Twig qui recupere la variable $products
            'products' => $products

        ]);
    }


    /**
     * Affiche le détail d'un produit
     * @param string $slug
     * @return Response
     */
    public function show(string $slug): Response
   {

       //throw new \Exception("test Erreur 500");

       var_dump($slug);

       // Récupération du Repository
       $repository = $this->getDoctrine()
           ->getRepository(Product::class);
       // Récupérations du produit lié au slug de l'url
       $product = $repository->findOneBy([
           //  'slug' est la propriété de l'Entité Product que l'on recupere :idem $this-> slug
           //  A 'slug' on attribue la valeur de la variable $slug : cette variable est l'argument de la fonction show()
           // cet argument correspond au slug qu'on ahoute dans l'url
           // findOneBy([ 'slug' => $slug  ]);  -> SELECT l'objet de la Class Product où sa propiété 'slug'  == argument passé dans l'url
           'slug' => $slug
           ]);

       dump($slug);


       // Si on n'a pas de produits => page 404
       if(!$product){

           throw $this->createNotFoundException('Produit non trouvé!');
       }


       // Renvoi du produit à la vue
       return $this->render('product/show.html.twig', [
           'product' => $product
           // 'product'  est une variable Twig qui recupere la variable $product
       ]);

   }




    public function create(Request $requestHTTP): Response
    {
        // Recuperation des POSTS
        //dump($requestHTTP->request);


        //Récuperation d'une Catégorie rentrée en BDD
        // on recupere dans la variable  $caregory une categorie de la BDD
        // la methode  find() prend toujours en parametre un id
        // on recupere donc la Categorie en BDD qui a l'id 1
        $category = $this->getDoctrine()
                               ->getRepository(Category::class)
                               ->find(1);


        // Création et remplissage du produit
        $product = new Product();

        $product
            ->setName('Chaise longue')
            ->setDescription('L\'indispensable de l\'été')
            ->setImageName('chaise-longue.jpg')
            ->setIsPublished(true)
            ->setPrice(55.99)
            // on recupere la categorie SELECT au-dessus
            ->setCategorie($category);

        dump($product);

        // Récupération du manager d'entité de Doctrine
        $manager = $this->getDoctrine()->getManager();
        // Préparation de la requête SQL
        $manager->persist($product);
        // Exécution de la requête SQL (INSERT INTO ...)
        $manager->flush();

        //dd($product);
        return $this->render('product/create.html.twig');


    }







}