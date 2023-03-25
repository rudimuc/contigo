<?php

namespace App\Entity\Tagging;

use App\Entity\Meta\Category;
use App\Repository\Tagging\CategoryTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryTagRepository::class)
 */
class CategoryTag extends GeneralTag
{
    /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
