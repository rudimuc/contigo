<?php

namespace App\Entity\Media;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Media\GalleryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GalleryRepository::class)]
#[ApiResource]
class Gallery extends MediaCollection
{
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $mindate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $maxdate = null;

    public function getMindate(): ?\DateTimeInterface
    {
        return $this->mindate;
    }

    public function setMindate(?\DateTimeInterface $mindate): static
    {
        $this->mindate = $mindate;

        return $this;
    }

    public function getMaxdate(): ?\DateTimeInterface
    {
        return $this->maxdate;
    }

    public function setMaxdate(?\DateTimeInterface $maxdate): static
    {
        $this->maxdate = $maxdate;

        return $this;
    }
}
