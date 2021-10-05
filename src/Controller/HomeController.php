<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy([]);

        if ($category) {
            return $this->redirectToRoute('category', ['id' => $category->getId()]);
        }

        return $this->render('home/index.html.twig', []);
    }
}
