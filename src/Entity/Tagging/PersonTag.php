<?php

namespace App\Entity\Tagging;

use App\Entity\Meta\Person;
use App\Repository\Tagging\PersonTagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonTagRepository::class)
 */
class PersonTag extends MarkTag
{
    /**
     * @ORM\ManyToOne(targetEntity=Person::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $person;

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }
}
