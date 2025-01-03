<?php

namespace App\Entity\Media;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Media\VideoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
#[ORM\Table(name: 'media_object_video')]
#[ApiResource]
class Video extends MediaObject
{
    #[ORM\Column(nullable: true)]
    private ?int $duration = null;

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }
}
