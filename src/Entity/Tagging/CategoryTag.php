<?php

namespace App\Entity\Tagging;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\Meta\Category;
use App\Repository\Tagging\CategoryTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * A "category tag" is a tag that references to a specific category for the media file.
 */
#[ORM\Entity(repositoryClass: CategoryTagRepository::class)]
#[ApiResource]
class CategoryTag extends GeneralTag
{
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }
}
