<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class MenuBuilder
{
    private $factory;
    private $isMember;

    public function __construct(FactoryInterface $factory, Security $security)
    {
        $this->factory = $factory;
        $this->isMember = ($security->getUser() instanceof UserInterface);
    }

    public function createMainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute("class", "sidebar-nav");

        $menu->addChild('menu.MenuStartpage', ['route' => 'app_default'])->setAttribute('icon', 'home');

        return $menu;
    }
}