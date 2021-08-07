<?php

// namespace App\Libraries;
use App\Models\Back\Menu_Model;

class sideBar
{
    public $menu;

    public function __construct()
    {
        $this->menu = new Menu_Model();
    }

    public function getMenu()
    {
        return $this->menu->findAll();
    }
}
