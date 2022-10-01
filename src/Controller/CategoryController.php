<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category_index')]
    public function index(CategoryRepository $repository): Response
    {
        $categories = $repository->findAll();
        //dump($categories);die;

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
