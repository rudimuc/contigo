<?php

namespace App\Entity\Tagging;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Tagging\PersonTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * A "person tag" is a tag that marks a specific person in the media file.
 */
#[ORM\Entity(repositoryClass: PersonTagRepository::class)]
#[ApiResource]
class PersonTag extends MarkTag
{

}
