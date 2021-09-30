<?php

namespace App\Entity;

use App\Repository\SubcategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubcategoryRepository::class)
 */
class Subcategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Graph::class, mappedBy="subcategory")
     */
    private $graphs;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="subcategories")
     */
    private $category;

    public function __construct()
    {
        $this->graphs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Graph[]
     */
    public function getGraphs(): Collection
    {
        return $this->graphs;
    }

    public function addGraph(Graph $graph): self
    {
        if (!$this->graphs->contains($graph)) {
            $this->graphs[] = $graph;
            $graph->setSubcategory($this);
        }

        return $this;
    }

    public function removeGraph(Graph $graph): self
    {
        if ($this->graphs->removeElement($graph)) {
            // set the owning side to null (unless already changed)
            if ($graph->getSubcategory() === $this) {
                $graph->setSubcategory(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getCategory()->getTitle() . ' - ' . $this->getTitle();
    }
}
