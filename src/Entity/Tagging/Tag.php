<?php

namespace App\Entity\Tagging;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Tagging\TagRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * A tag is a label that can be attached to a media file.
 */
#[ORM\Entity(repositoryClass: TagRepository::class)]
#[ORM\InheritanceType('SINGLE_TABLE')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(["generaltag" => "GeneralTag", "placetag" => "PlaceTag", "marktag" => "MarkTag", "persontag" => "PersonTag", "categorytag" => "CategoryTag"])]
#[ApiResource]
abstract class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creationdate = null;

    public function __construct()
    {
        $this->creationdate = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationdate(): ?\DateTimeInterface
    {
        return $this->creationdate;
    }

    public function setCreationdate(\DateTimeInterface $creationdate): static
    {
        $this->creationdate = $creationdate;

        return $this;
    }
}
