<?php

namespace App\Entity\Tagging;

use App\Repository\Tagging\PlaceTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaceTagRepository::class)
 */
class PlaceTag extends GeneralTag
{

}
