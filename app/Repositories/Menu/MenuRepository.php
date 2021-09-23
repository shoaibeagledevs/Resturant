<?php
namespace App\Repositories\Menu;

use App\Http\Requests\Menu\StoreMenu;
use App\Interfaces\Menu\MenuInterface;
use App\Traits\ResponseAPI;
use App\Models\Menu;
use DB;

class MenuRepository implements MenuInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    public function getMenusByResturantId($resturant_id)
    {
        try {

            $menus = DB::table('menus')
            ->join('resturants', 'resturants.id', '=', 'menus.resturant_id')
            ->select('menus.*','resturants.name')
            ->where('menus.resturant_id',$resturant_id)
            ->Paginate(10);
            return $this->success("All Menus", $menus);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function createMenu(StoreMenu $request,$resturant_id,$id=null)
    {
        DB::beginTransaction();
        try {
            // If menu exists when we find it
            // Then update the menu
            // Else create the new one.
            $menu = $id ? Menu::find($id) : new Menu;

            // Check the resturant 
            if($id && !$menu) return $this->error("No menu with ID $id", 404);

            $payload=$request->payload;
            $payload['category'] ? $category=$payload['category'] : $category= DB::table('menus')->where('resturant_id',$resturant_id)->value('category')->order_by('created_at','desc')->limit(1);

            $menu->resturant_id = $resturant_id;
            $menu->item = $payload['name'];
            $menu->category = $payload['category'];
            // Save the menu
            $menu->save();
        

            DB::commit();
            return $this->success(
                $id ? "Menu updated"
                    : "Menu created",
                $menu, $id ? 200 : 201);
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}