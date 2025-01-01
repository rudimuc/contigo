<?php

namespace App\Entity\Media;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Media\SmartGalleryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SmartGalleryRepository::class)]
#[ApiResource]
class SmartGallery extends MediaCollection
{
    #[ORM\Column(type: Types::TEXT)]
    private ?string $query = null;

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function setQuery(string $query): static
    {
        $this->query = $query;

        return $this;
    }
}
