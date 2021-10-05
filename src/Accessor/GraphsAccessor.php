<?php

namespace App\Accessor;

use App\Entity\Category;
use App\Entity\Graph;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\RouterInterface;

class GraphsAccessor
{
    private $entityManager;
    private $router;

    public function __construct(EntityManagerInterface $entityManager, RouterInterface $router)
    {
        $this->entityManager = $entityManager;
        $this->router = $router;
    }

    public function access(): array
    {
        return $this->entityManager->getRepository(Graph::class)->findAll();
    }

    public function accessToSearch(): bool|string
    {
        return json_encode(array_map(function (Graph $graph) {
            return [
                'title' => $graph->getTitle(),
                'category' => $graph->getSubcategory()->getCategory()->getTitle(),
                'link' => $this->router->generate(
                    'category',
                        ['id' => $graph->getSubcategory()->getCategory()->getId()]
                    ) . '#' . $graph->getId()
            ];
        }, $this->entityManager->getRepository(Graph::class)->findAll()));
    }
}