<?php

namespace App\Entity\Tagging;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Tagging\CategoryTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * A "category tag" is a tag that references to a specific category for the media file.
 */
#[ORM\Entity(repositoryClass: CategoryTagRepository::class)]
#[ApiResource]
class CategoryTag extends GeneralTag
{

}
