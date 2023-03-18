<?php

namespace App\Entity\Media;

use App\Repository\Media\SmartGalleryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SmartGalleryRepository::class)
 */
class SmartGallery extends MediaCollection
{
    /**
     * @ORM\Column(type="text")
     */
    private $query;

    public function getQuery(): ?string
    {
        return $this->query;
    }

    public function setQuery(string $query): self
    {
        $this->query = $query;

        return $this;
    }
}
