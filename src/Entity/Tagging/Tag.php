<?php

namespace App\Entity\Tagging;

use App\Repository\Tagging\TagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 * @ORM\Table(name="tag")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="tagdisc", type="string")
 * @ORM\DiscriminatorMap({"persontag" = "PersonTag", "placetag" = "PlaceTag", "marktag" = "MarkTag", "generaltag" = "GeneralTag", "categorytag" = "CategoryTag"})
 */
abstract class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function __construct()
    {
        $this->creationDate = new \DateTime();
    }

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }
}
