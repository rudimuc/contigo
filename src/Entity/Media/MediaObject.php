<?php

namespace App\Entity\Media;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Media\MediaObjectRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaObjectRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "type", type: "string")]
#[ORM\DiscriminatorMap(["image" => "Image", "video" => "Video"])]
#[ApiResource]
abstract class MediaObject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $storagename = null;

    #[ORM\Column(length: 255)]
    private ?string $originalfilename = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $mimetype = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $uploaddate = null;

    #[ORM\Column(nullable: true)]
    private ?float $rating = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?MediaCollection $collection = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStoragename(): ?string
    {
        return $this->storagename;
    }

    public function setStoragename(string $storagename): static
    {
        $this->storagename = $storagename;

        return $this;
    }

    public function getOriginalfilename(): ?string
    {
        return $this->originalfilename;
    }

    public function setOriginalfilename(string $originalfilename): static
    {
        $this->originalfilename = $originalfilename;

        return $this;
    }

    public function getMimetype(): ?string
    {
        return $this->mimetype;
    }

    public function setMimetype(?string $mimetype): static
    {
        $this->mimetype = $mimetype;

        return $this;
    }

    public function getUploaddate(): ?\DateTimeInterface
    {
        return $this->uploaddate;
    }

    public function setUploaddate(\DateTimeInterface $uploaddate): static
    {
        $this->uploaddate = $uploaddate;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getCollection(): ?MediaCollection
    {
        return $this->collection;
    }

    public function setCollection(?MediaCollection $collection): static
    {
        $this->collection = $collection;

        return $this;
    }

}
