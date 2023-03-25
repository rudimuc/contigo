<?php

namespace App\Entity\Meta;

use App\Repository\Meta\PlacePolygonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlacePolygonRepository::class)
 */
class PlacePolygon extends Place
{
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $polygon;

    public function getPolygon(): ?string
    {
        return $this->polygon;
    }

    public function setPolygon(?string $polygon): self
    {
        $this->polygon = $polygon;

        return $this;
    }
}
