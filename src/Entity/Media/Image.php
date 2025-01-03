<?php

namespace App\Entity\Media;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Media\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[ORM\Table(name: 'media_object_image')]
#[ApiResource]
class Image extends MediaObject
{
    #[ORM\Column(nullable: true)]
    private ?int $iso = null;

    public function getIso(): ?int
    {
        return $this->iso;
    }

    public function setIso(?int $iso): static
    {
        $this->iso = $iso;

        return $this;
    }
}
