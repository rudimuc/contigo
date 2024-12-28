<?php

namespace App\Entity\Tagging;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\Meta\Person;
use App\Repository\Tagging\PersonTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * A "person tag" is a tag that marks a specific person in the media file.
 */
#[ORM\Entity(repositoryClass: PersonTagRepository::class)]
#[ApiResource]
class PersonTag extends MarkTag
{
    #[ORM\ManyToOne(inversedBy: 'personTags')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

        return $this;
    }
}
