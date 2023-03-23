<?php

namespace App\Entity\Tagging;

use App\Repository\Tagging\GeneralTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GeneralTagRepository::class)
 */
abstract class GeneralTag extends Tag
{

}
