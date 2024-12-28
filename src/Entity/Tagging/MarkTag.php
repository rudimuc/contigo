<?php

namespace App\Entity\Tagging;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Tagging\MarkTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * A "mark tag" is a tag that applies to a specific part of the media file.
 */
#[ORM\Entity(repositoryClass: MarkTagRepository::class)]
#[ApiResource]
abstract class MarkTag extends Tag
{

}
