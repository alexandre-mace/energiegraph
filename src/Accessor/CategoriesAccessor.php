<?php

namespace App\Accessor;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;

class CategoriesAccessor
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function access(): array
    {
        return $this->entityManager->getRepository(Category::class)->findAll();
    }
}