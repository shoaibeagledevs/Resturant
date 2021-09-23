<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use DB;
use App\Interfaces\Menu\MenuInterface;
use App\Http\Requests\Menu\StoreMenu;


class MenuController extends Controller
{
	protected $menuInterface;


	public function __construct(MenuInterface $menuInterface)
    {
        $this->menuInterface = $menuInterface;
    }


    public function getMenusByResturantId($resturant_id)
    {
       return $this->menuInterface->getMenusByResturantId($resturant_id);
    }
    public function createMenu(StoreMenu $request,$resturant_id)
    {   
       
       return  $this->menuInterface->createMenu($request,$resturant_id);
    }
    
}
