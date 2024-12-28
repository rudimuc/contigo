<?php

namespace App\Entity\Tagging;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Tagging\GeneralTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * A "general tag" is a tag that applies to the whole media file. It is not specific to a particular part of the media file.
 */
#[ORM\Entity(repositoryClass: GeneralTagRepository::class)]
#[ApiResource]
abstract class GeneralTag extends Tag
{

}
