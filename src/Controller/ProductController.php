<?php

namespace App\Controller;

use App\Form\ProductType;
use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{

    #[Route('/product/gallery', name: 'app_gallery')]
    public function gallery(EntityManagerInterface $entityManager, Request $request): Response{
        $product = $entityManager->getRepository(Products::class)->findAll();

        return $this->render('product/gallery.html.twig', [
            'product' => $product,
        ]);
    }



    #[Route('/product/{slug}', name: 'app_product_details')]
    public function view(EntityManagerInterface $entityManager, string $slug, Request $request): Response
    {
        // Récupérer l'URL de la page précédente
        $previousPageUrl = $request->headers->get('referer');

        // Récupérer le produit
        $product = $entityManager->getRepository(Products::class)->findOneBySlug($slug);

        if (!$product){
            throw $this->createNotFoundException(
                'Product not found ('.$id.')'
            );
        }

        return $this->render('product/details.html.twig', [
            'product' => $product,
            'previousPageUrl' => $previousPageUrl,
        ]);
    }

    #[Route('/product/{id}', name: 'app_product')]
    public function index(EntityManagerInterface $entityManager, int $id): Response
    {
        $product = $entityManager->getRepository(Products::class)->find($id);

        if (!$product){
            throw $this->createNotFoundException(
                'Product not found ('.$id.')'
            );
        }

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'name' => $product->getName()
        ]);
    }

    #[Route('/add-product', name: 'create_product')]
    public function createProducts(EntityManagerInterface $entityManager): Response
    {
        $product = new Products();
        $product->setName('Berserk - Intégrale');
        $product->setSlug('berserk');
        $product->setDescription('Lorem ipsum');
        $product->setImage('default-product.png');
        $product->setLink('https://tailwindui.com/components?ref=sidebar');
        $product->setOfferprice(75);
        $product->setOriginalprice(140);
        $product->setSeries('Berserk');
        $product->setState('Good');
        $product->setUlpoaddate(new \DateTime('2024-03-29'));
        $product->setType('Seinen');
        $product->setAuthor('Kentaro Miura');
        $product->setEditor('Hakusensha');
        $product->setVolumes(42);


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());

    }

}
