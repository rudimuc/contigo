<?php

namespace App\Entity\Media;

use App\Repository\Media\GalleryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GalleryRepository::class)
 */
class Gallery extends MediaCollection
{
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $minimumDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $maximumDate;

    public function getMinimumDate(): ?\DateTimeInterface
    {
        return $this->minimumDate;
    }

    public function setMinimumDate(?\DateTimeInterface $minimumDate): self
    {
        $this->minimumDate = $minimumDate;

        return $this;
    }

    public function getMaximumDate(): ?\DateTimeInterface
    {
        return $this->maximumDate;
    }

    public function setMaximumDate(?\DateTimeInterface $maximumDate): self
    {
        $this->maximumDate = $maximumDate;

        return $this;
    }
}
