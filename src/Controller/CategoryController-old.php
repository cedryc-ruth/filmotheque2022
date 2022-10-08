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

    #[Route('/category/{id}', methods: ['GET'], name: 'category_show')]
    public function show(CategoryRepository $repository, int $id): Response
    {
        $category = $repository->find($id);

        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/category/{id}', methods: ['DELETE'], name: 'category_destroy')]
    public function destroy(CategoryRepository $repository, int $id): Response
    {
        $category = $repository->find($id);

        $repository->remove($category);

        return $this->redirectToroute('category_index');
    }
}
