<?php

namespace App\Entity\Tagging;

use App\Repository\Tagging\PersonTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonTagRepository::class)
 */
class PersonTag extends MarkTag
{

}
