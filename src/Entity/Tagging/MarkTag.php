<?php

namespace App\Entity\Tagging;

use App\Repository\Tagging\MarkTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarkTagRepository::class)
 */
abstract class MarkTag extends Tag
{

}
