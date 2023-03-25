<?php

namespace App\Entity\Meta;

use App\Repository\Meta\PlaceExternalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaceExternalRepository::class)
 */
class PlaceExternal extends Place
{
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sourceId;

    public function getSourceId(): ?int
    {
        return $this->sourceId;
    }

    public function setSourceId(?int $sourceId): self
    {
        $this->sourceId = $sourceId;

        return $this;
    }
}
