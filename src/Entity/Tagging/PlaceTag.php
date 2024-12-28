<?php

namespace App\Entity\Tagging;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Tagging\PlaceTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * A "place tag" is a tag that references to a specific place for the media file.
 */
#[ORM\Entity(repositoryClass: PlaceTagRepository::class)]
#[ApiResource]
class PlaceTag extends GeneralTag
{

}
