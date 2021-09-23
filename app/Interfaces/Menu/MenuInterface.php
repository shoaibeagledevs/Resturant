<?php

namespace App\Interfaces\Menu;

use App\Http\Requests\Menu\StoreMenu;

interface MenuInterface
{
    

    public function getMenusByResturantId($resturant_id);

   
    public function createMenu(StoreMenu $request,$resturant_id,$id = null);

   
}