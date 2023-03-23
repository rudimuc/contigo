<?php

namespace App\Entity\Tagging;

use App\Repository\Tagging\CategoryTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryTagRepository::class)
 */
class CategoryTag extends GeneralTag
{

}
