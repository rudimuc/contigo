<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="setting")
 */
class SettingItem
{
    /**
     * @ORM\Column(type="string", length=100, nullable=false )
     */
    private $settingvalue;

    /**
     * @ORM\Column(type="string", length=100, nullable=false )
     */
    private $description;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=100, nullable=false )
     */
    private $settingname;

    public function getSettingvalue(): ?string
    {
        return $this->settingvalue;
    }

    public function setSettingvalue(string $settingvalue): self
    {
        $this->settingvalue = $settingvalue;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSettingname(): ?string
    {
        return $this->settingname;
    }

    public function setSettingname(string $settingname): self
    {
        $this->settingname = $settingname;

        return $this;
    }


}
