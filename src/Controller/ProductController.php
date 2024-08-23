<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Product;
use App\Form\ProductType;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager =  $doctrine->getManager();
        $productRepository = $doctrine->getRepository(Product::class);
        $products = $productRepository->findAll();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'title' => 'Productos',
            'products' => $products
        ]);
    }

    #[Route('/products/show/{id}', name: 'show_product')]
    public function show(Product $product)
    {
        if (!$product) {
            return $this->redirecttoRoute('products');
        }

        return $this->render('product/detail.html.twig',[
			'product' => $product
		]);

    }

    #[Route('/products/create', name: 'create_product')]
    public function create(Request $request, ManagerRegistry $doctrine)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $data = $form->getData();
            $product->setProduct($data->getProduct());
            $product->setDescription($data->getDescription());
            $product->setPrice($data->getPrice());

            $entityManager = $doctrine->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
			
			return $this->redirect($this->generateUrl('show_product', [
				'id' => $product->getId()
			]));
		}

        return $this->render('product/create.html.twig',[
            'title' => 'Crear',
            'form' => $form->createView()
        ]);   
    }

    #[Route('/products/edit/{id}', name: 'edit_product')]
    public function edit(Product $product, Request $request, ManagerRegistry $doctrine)
    {
        if (!$product)
        {
            return $this->redirecttoRoute('products');
        }

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $data = $form->getData();
            $product->setProduct($data->getProduct());
            $product->setDescription($data->getDescription());
            $product->setPrice($data->getPrice());

            $entityManager = $doctrine->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
			
			return $this->redirect($this->generateUrl('show_product', [
				'id' => $product->getId()
			]));
		}

        return $this->render('product/create.html.twig',[
            'title' => 'Editar',
            'form' => $form->createView()
        ]);

    }

    #[Route('/products/delete/{id}', name: 'delete_product')]
    public function destroy(ManagerRegistry $doctrine, Product $product)
    {
        if (!$product)
        {
            return $this->redirecttoRoute('products');
        }

        $entityManager = $doctrine->getManager();
        $entityManager->remove($product);
        $entityManager->flush();
        
        return $this->redirectToRoute('products');
    }

}
