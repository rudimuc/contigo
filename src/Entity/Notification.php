<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="notification")
 */
class Notification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500, nullable=false )
     */
    private $text;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $daystamp;

    /**
     * @ORM\Column(type="string", length=100, nullable=true )
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=32, nullable=false )
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=32, nullable=false )
     */
    private $icontype;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDaystamp(): ?\DateTimeInterface
    {
        return $this->daystamp;
    }

    public function setDaystamp(\DateTimeInterface $daystamp): self
    {
        $this->daystamp = $daystamp;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIcontype(): ?string
    {
        return $this->icontype;
    }

    public function setIcontype(string $icontype): self
    {
        $this->icontype = $icontype;

        return $this;
    }


}
